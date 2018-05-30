<?php
namespace app\modules\mch\controllers\eye;

use app\modules\mch\controllers\Controller;
use yii;
use app\models\PersonCard;
use app\models\PersonCardForm;
use yii\data\Pagination;



class PersonCardController extends Controller
{
    function actionIndex()
    {
	    $query =PersonCard::find()->select('id,f_id,title,tip,type')->where(['is_del'=>0]);
	    $count = $query->count();
	    $pagination = new Pagination(['totalCount' => $count]);
	    $data = $query->offset($pagination->offset)
		    ->asArray()
		    ->limit($pagination->limit)
		    ->all();
	    $var =[
		    'data'=>$data,
		    'pagination'=>$pagination,
	    ];
	    return $this->render('index',$var);
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