<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/6/4
 * Time: 10:36
 */

namespace app\modules\mch\controllers\eye;

use app\models\EyeUser;
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

        $user = EyeUser::find()->select('userid,f_id')->asArray()->all();
        $data2 =[];
        foreach ($data as $k1 => $v1){
            if(!isset($data2[$v1['id']])){
                $data2[$v1['id']]=[
                    'id'=>$v1['id'],
                    'name'=>$v1['name'],
                    'users'=>[],
                ];
            }
            foreach ($user as $k2 => $v2){
                if($v2['f_id'] == $v1['id']){
                    $data2[$v1['id']]['users'][] = $v2['userid'];
                }
            }
        }
        $data2 = array_values($data2);
        $var =[
            'data'=>$data2,
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