<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 26/05/2018
 * Time: 1:37 AM
 */

namespace app\modules\api\controllers\eye;

use yii;
use app\models\EyeCard;
use app\models\EyeCardForm;
use yii\db\Query;
use app\helper\Response;

class EyeCardController extends BaseController
{
    public function actionIndex()
    {
        $data = (new Query())->select('id,title,day,status')->from(EyeCard::tableName())->where(['is_del'=>0])->all();
        if($data){
	        return Response::json(1,'成功',$data);
        }
	    return Response::json(0,'成功',$data);
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