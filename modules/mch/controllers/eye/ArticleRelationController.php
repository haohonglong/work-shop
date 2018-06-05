<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/6/5
 * Time: 18:47
 */

namespace app\modules\mch\controllers\eye;

use app\models\User;
use yii;
use yii\db\Query;
use app\models\EyeUserWithRelation;
use app\modules\mch\controllers\Controller;
use yii\data\Pagination;

class ArticleRelationController extends Controller
{
    public function actionIndex()
    {
        $query = EyeUserWithRelation::find()
            ->select('r.*,u.nickname')
            ->from(['u'=>User::tableName()])
            ->innerJoin(['r'=>EyeUserWithRelation::tableName()],'r.user_id = u.id');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);

        $data = $query->offset($pagination->offset)
            ->asArray()
            ->limit($pagination->limit)
            ->all();


        return $this->render('index',[
            'data'=>$data,
            'pagination'=>$pagination,
        ]);

    }

    /**
     * 同一类型同一id同一人不能添加两次
     * @param $model
     * @return bool
     */
    private function is_repeat($model)
    {
        $data = (new Query())
            ->from(EyeUserWithRelation::tableName())
            ->where(['type'=>$model->type,'relation_id'=>$model->relation_id,'user_id'=>$model->user_id])
            ->one();
        if($data){
            return true;
        }
        return false;
    }
    public function actionAdd()
    {
        $model = new EyeUserWithRelation();
        if($model->load(yii::$app->request->post())){

            if(!$this->is_repeat($model) && $model->validate() && $model->save()){

            }
            return $this->redirect(['index']);
        }
        return $this->render('add',[
            'model'=>$model,
            'user_list'=>$this->getUsers(),
        ]);
    }

    public function actionEdit($id)
    {
        $model = EyeUserWithRelation::findOne($id);
        if($model->load(yii::$app->request->post())){
            if(!$this->is_repeat($model) && $model->validate() && $model->save()){

            }
            return $this->redirect(['index']);
        }
        return $this->render('edit',[
            'model'=>$model,
            'user_list'=>$this->getUsers(),
        ]);
    }

    public function actionDel($id)
    {
        $model = EyeUserWithRelation::findOne($id);
        if($model && $model->delete()){
            return $this->redirect(['index']);
        }
    }


}