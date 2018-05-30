<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 26/05/2018
 * Time: 3:40 PM
 */

namespace app\modules\api\controllers\eye;

use app\models\User;
use yii;
use yii\db\Query;
use app\models\EyeInfo;
use app\helper\Response;

class EyeInfoController extends BaseController
{
    /**
     * type{integer} 根据人员卡类型，获取所有人眼的信息
     * @return object
     */
    public function actionIndex()
    {
    	$request = yii::$app->request;
        $type = $request->post('type');
        $data = (new Query())
            ->select('u.id as user_id,u.sex,u.username,u.age,u.avatar_url,u.family_type')
            ->addSelect('e.*')
            ->from(User::tableName().' as u')
            ->innerJoin(EyeInfo::tableName().' as e','e.user_id = u.id')
            ->where(['e.is_del'=>0,'u.family_type'=>$type])
            ->all();
        if($data){
            return Response::json(1,'成功',$data);
        }
        return Response::json(0,'没有匹配的数据');

    }

    public function actionAdd()
    {
        $request = yii::$app->request;
        $model = new EyeInfo();
        $model->advice = $request->post('advice');
        $model->user_id = $request->post('user_id');
        $model->num_R = $request->post('num_R');
        $model->num_L = $request->post('num_L');
        $model->num_RS = $request->post('num_RS');
        $model->num_LS = $request->post('num_LS');
        $date = $request->post('date');
        if($date){$model->date = $date;}
        if ($model->validate() && $model->save()) {
            return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }

    public function actionEdit()
    {
        $request = yii::$app->request;
        $model = EyeInfo::getById($request->post('id'));
        if($model){
            $model->num_R = $request->post('num_R');
            $model->num_L = $request->post('num_L');
            $model->num_RS = $request->post('num_RS');
            $model->num_LS = $request->post('num_LS');
            $date = $request->post('date');
            if($date){
                $model->date = $date;
            }
            $model->advice = $request->post('advice');
            $model->user_id = $request->post('user_id');
            if ($model->validate() && $model->save()) {
	            return Response::json(1,'成功');
            }
	        return Response::json(0,'失败');
        }
        return Response::json('0','没有对应id 信息');

    }

    public function actionDel()
    {
        $request = yii::$app->request;
        $id = $request->post('id');
        if(EyeInfo::del($id)){
	        return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }
}