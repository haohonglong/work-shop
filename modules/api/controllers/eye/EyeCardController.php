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
use app\models\User;
use yii;
use app\models\EyeCard;
use app\models\EyeCardForm;
use yii\db\Query;
use app\helper\Response;

class EyeCardController extends BaseController
{
    public function actionIndex()
    {

        $user_id = yii::$app->request->get('user_id');
        $data = (new Query())
            ->select('c.title,r.create_at,c.id')
            ->from(['u'=>User::tableName()])
            ->innerJoin(['r'=>EyeRecordLog::tableName()],'r.user_id = u.id')
            ->innerJoin(['c'=>EyeCard::tableName()],'r.eye_card_id = c.id')
            ->where(['r.user_id'=>$user_id])
            ->all();

        if(!empty($data)){
            $arr=[];
            foreach ($data as $k => $v){
                if(!isset($arr[$v['id']])){
                    $arr[$v['id']]=[
                        'id'=>$v['id'],
                        'title'=>$v['title'],
                        'time'=>[],
                        'count'=>0,
                        'status'=>0,
                    ];
                }
                $arr[$v['id']]['time'][] = $v['create_at'];
                $arr[$v['id']]['count']++;
                if(Date::isCurent($v['create_at'])){
                    $arr[$v['id']]['status'] = 1;
                }

            }
        $arr = array_values($arr);
            $data = $arr;
	        return Response::json(1,'成功',$data);
        }
	    return Response::json(0,'失败');
    }


    public function actionAdd()
    {
        $model = new EyeCardForm();
        $request = yii::$app->request;
        $model->title = $request->post('title');
        $model->day = $request->post('day');
        if ($model->save()) {
            return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }

    public function actionEdit()
    {
        $model = new EyeCardForm();
        $request = yii::$app->request;
        $model->id = $request->post('id');
        $model->title = $request->post('title');
        $model->day = $request->post('day');
        if ($model->edit()) {
            return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }


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
                if(Date::isCurent($v['create_at'])){
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

	public function actionEditStatus()
	{
		$request = yii::$app->request;
		$id = $request->post('id');
		$status = $request->post('status');
		$model = EyeCard::getById($id);
		if($model){
			if((1 == $status || 0 == $status)){
				$model->status = $status;
				if ($model->save()) {
					return Response::json(1,'状态修改成功');
				}
			}else{
				return Response::json(0,'status 参数不对');
			}
		}
		return Response::json(0,'失败');
	}
    public function actionDel()
    {
        $request = yii::$app->request;
        $id = $request->post('id');
        if(EyeCard::del($id)){
            return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');


    }



}