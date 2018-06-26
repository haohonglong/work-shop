<?php
namespace app\modules\mch\controllers\eye;

use app\models\Family;
use app\modules\mch\controllers\Controller;
use yii;
use app\models\PersonCard;
use app\models\PersonCardForm;
use yii\data\Pagination;
use yii\db\Query;
use yii\helpers\ArrayHelper;


class PersonCardController extends Controller
{
    public function actionIndex()
    {
	    $query =PersonCard::find()->select('id,title,tip,type')->where(['is_del'=>0]);
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



    public function actionAdd()
    {
        $model = new PersonCardForm();
        $request = yii::$app->request;


        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $var =[
            'model'=>$model,
        ];
        return $this->render('add',$var);

    }
    public function actionEdit($id)
    {
        $request = yii::$app->request;
        $model = PersonCard::getById($id);
        if($model){
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
            $var =[
                'model'=>$model
            ];
            return $this->render('edit',$var);
        }
    }
    public function actionDel($id)
    {
        if(PersonCard::del($id)){

        }
        return $this->redirect(['index']);
    }
}