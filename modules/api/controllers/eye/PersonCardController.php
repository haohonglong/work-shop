<?php
namespace app\modules\api\controllers\eye;

use yii;
use app\helper\Response;
use app\models\PersonCard;
use app\models\PersonCardForm;
use yii\db\Query;



class PersonCardController extends BaseController
{
    function actionIndex()
    {
        $data = (new Query())->select('id,f_id,title,tip,type')->from(PersonCard::tableName())->where(['is_del'=>0])->all();
        if($data){
	        return Response::json(1,'成功',$data);
        }
	    return Response::json(0,'成功',$data);
    }

    function actionAdd()
    {
        $model = new PersonCardForm();
        $request = yii::$app->request;
        $model->title = $request->post('title');
        $model->f_id = $request->post('f_id');
        $model->tip = $request->post('tip');
        $model->type = $request->post('type');
        if ($model->save()) {
            return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }
    function actionEdit()
    {
        $model = new PersonCardForm();
        $request = yii::$app->request;
        $model->id = $request->post('id');
        $model->title = $request->post('title');
        $model->tip = $request->post('tip');
        if ($model->edit()) {
            return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }
    function actionDel()
    {
        $request = yii::$app->request;
        $id = $request->post('id');
        if(PersonCard::del($id)){
	        return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }
}