<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 26/05/2018
 * Time: 1:37 AM
 */

namespace app\modules\mch\controllers\eye;

use app\modules\mch\controllers\Controller;

use yii;
use app\models\EyeCard;
use app\models\EyeCardForm;
use yii\data\Pagination;

class EyeCardController extends Controller
{
    public function actionIndex()
    {
        $query = EyeCard::find()->select('id,title')->from(EyeCard::tableName());
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
        $model = new EyeCardForm();
        $request = yii::$app->request;
        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $var =[
            'model'=>$model
        ];
        return $this->render('add',$var);
    }

    public function actionEdit($id)
    {
        $request = yii::$app->request;
        $model = EyeCard::getById($id);
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
        if(EyeCard::del($id)){

        }
        return $this->redirect(['index']);


    }



}