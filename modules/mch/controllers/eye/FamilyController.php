<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/6/4
 * Time: 10:36
 */

namespace app\modules\mch\controllers\eye;

use yii;
use app\models\Family;
use app\modules\mch\controllers\Controller;
use yii\data\Pagination;

class FamilyController extends Controller
{
    public function actionIndex()
    {
        $query =Family::find()->select('id,name');
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
        $model = new Family();
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
        $model = Family::getById($id);
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
}