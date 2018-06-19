<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 26/05/2018
 * Time: 1:37 AM
 */

namespace app\modules\api\controllers\eye;

use app\helper\Date;
use app\models\EyeRecordLog;
use yii;
use app\models\EyeCard;
use app\models\EyeCardForm;
use yii\db\Query;
use app\helper\Response;

class EyeCardController extends BaseController
{


    /**
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionIndex
     * 功能：
     * 说明：
     * 注意：
     * @api {get} http://youtong.shop/api/eye/eye-card/index 获取打卡信息
     * @apiParam {Number} user_id  用户id
     * @return object
     */
    public function actionIndex()
    {

        $user_id = yii::$app->request->get('user_id');
        $data = (new Query())
            ->select('r.create_at,c.id,c.title')
            ->from(['c'=>EyeCard::tableName()])
            ->leftJoin(['r'=>EyeRecordLog::tableName()],'r.eye_card_id = c.id and r.user_id = :userID',[':userID'=>$user_id])
            ->all();
        if(!empty($data)){
            $arr=[];
            foreach ($data as $k => $v){
                if(!isset($arr[$v['id']])){
                    $arr[$v['id']]=[
                        'id'=>$v['id'],
                        'title'=>$v['title'],
                        'time'=>[],
                        'day'=>0,
                        'status'=>0,
                    ];
                }
                $arr[$v['id']]['time'][] = $v['create_at'];
                if(isset($v['create_at']) && Date::isCurentMonth($v['create_at'])){
                    $arr[$v['id']]['day']++;
                }
                if(isset($v['create_at']) && Date::isCurentDay($v['create_at'])){
                    $arr[$v['id']]['status'] = 1;
                }

            }
            foreach ($arr as &$v){
                unset($v['time']);
            }
            $data = array_values($arr);;
	        return Response::json(1,'successfully',$data);
        }
	    return Response::json(0,'fail');
    }

    /**
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionAdd
     * 功能：
     * 说明：
     * 注意：
     * @return object
     */
    public function actionAdd()
    {
        $model = new EyeCardForm();
        $request = yii::$app->request;
        $model->title = $request->post('title');
        if ($model->save()) {
            return Response::json(1,'successfully');
        }
	    return Response::json(0,'fail');
    }

    public function actionEdit()
    {
        $model = new EyeCardForm();
        $request = yii::$app->request;
        $model->id = $request->post('id');
        $model->title = $request->post('title');
        if ($model->edit()) {
            return Response::json(1,'successfully');
        }
	    return Response::json(0,'fail');
    }


    /**
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionRecord
     * 功能：
     * 说明：
     * 注意：
     * @api {post} http://youtong.shop/api/eye/eye-card/record 记录打卡
     * @apiParam {Number} user_id  用户id
     * @apiParam {Number} eye_card_id  当前卡的id
     * @return object
     */
    public function actionRecord()
    {
        $request = yii::$app->request;
        $user_id = $request->post('user_id');
        $eye_card_id = $request->post('eye_card_id');
        $data = EyeRecordLog::find()
            ->asArray()
            ->where(['user_id'=>$user_id,'eye_card_id'=>$eye_card_id])->all();
        if($data){
            foreach ($data as $k => $v){
                if(Date::isCurentDay($v['create_at'])){
                    return Response::json(0,'今天已经打过卡了');
                }
            }
        }
        $model = new EyeRecordLog();
        $model->user_id = $user_id;
        $model->eye_card_id = $eye_card_id;
        $model->create_at = date('Y-m-d H:i:s');
        if($model->validate() && $model->save()){
            return Response::json(1,'successfully');
        }
        return Response::json(0,'打卡失败');
    }






}