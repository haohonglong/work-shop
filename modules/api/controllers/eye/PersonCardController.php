<?php
namespace app\modules\api\controllers\eye;

use app\models\User;
use yii;
use app\helper\Response;
use app\models\PersonCard;
use app\models\PersonCardForm;
use yii\db\Query;



class PersonCardController extends BaseController
{
    function actionIndex()
    {
        $data = (new Query())
            ->select('p.id,p.f_id,p.title,p.tip,p.type,u.id as user_id,u.avatar_url')
            ->from(['u'=>User::tableName()])
            ->innerJoin(['p'=>PersonCard::tableName()],'p.user_id = u.id')
            ->where(['p.is_del'=>0])->all();
        if($data){
	        return Response::json(1,'successfully',$data);
        }
	    return Response::json(0,'fail');
    }

    function actionAdd()
    {
        $model = new PersonCardForm();
        $request = yii::$app->request;
        $model->title = $request->post('title');
        $model->user_id = $request->post('user_id');
        $model->f_id = $request->post('f_id');
        $model->tip = $request->post('tip');
        $model->type = $request->post('type');
        if ($model->save()) {
            return Response::json(1,'successfully');
        }
	    return Response::json(0,'fail');
    }
    function actionEdit()
    {
        $model = new PersonCardForm();
        $request = yii::$app->request;
        $model->id = $request->post('id');
        $model->title = $request->post('title');
        $model->tip = $request->post('tip');
        if ($model->edit()) {
            return Response::json(1,'successfully');
        }
	    return Response::json(0,'fail');
    }
    function actionDel()
    {
        $request = yii::$app->request;
        $id = $request->get('id');
        if(PersonCard::del($id)){
	        return Response::json(1,'successfully');
        }
	    return Response::json(0,'fail');
    }
}