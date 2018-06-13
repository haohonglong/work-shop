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


    public function actionEdit($id=null)
    {
        $request = yii::$app->request;
        $model = Family::find()->where(['id'=>$id])->limit(1)->one();
        $title = "修改";
        if(!$model){
            $title = "添加";
            $model = new Family();

        }
        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('edit',[
            'model'=>$model,
            'title'=>$title,
        ]);
    }
}