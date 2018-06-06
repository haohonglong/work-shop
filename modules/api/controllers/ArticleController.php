<?php
/**
 * User: Xany <762632258@qq.com>
 * Date: 2017/8/18
 * Time: 14:17
 */

namespace app\modules\api\controllers;

use app\helper\Response;
use app\models\EyeUserWithRelation;
use app\modules\api\controllers\eye\BaseController;
use yii;
use app\models\Article;
use app\modules\mch\models\Model;

class ArticleController extends BaseController
{
    public function actionIndex($cat_id = 1)
    {

    }

    /**
     *
     * @return object
     */
    public function actionAdd()
    {
        $request = yii::$app->request;
        $title = $request->post('title');
        $user_id = $request->post('user_id');
        $content = $request->post('content');
        $model = new Article();
        $model->title = $title;
        $model->content = $content;
        $model->addtime = time();
        if($model->save()){
            $id = $model->attributes['id'];
            //添加的时候同时添加到关联表里
            $relation = new EyeUserWithRelation();
            $relation->type = 1;
            $relation->user_id = $user_id;
            $relation->relation_id = $id;
            if(!EyeUserWithRelation::has_one($relation) && $relation->save()){

            }
            return Response::json(1,'successfully');
        }
        return Response::json(0,'保存失败');

    }

    public function actionEdit()
    {
        $request = yii::$app->request;
        $id = $request->post('id');
        $title = $request->post('title');
        $content = $request->post('content');
        $model = Article::findOne($id);
        if($model){
            $model->title = $title;
            $model->content = $content;
            if($model->save()){
                return Response::json(1,'successfully');
            }
            return Response::json(0,'修改失败');
        }else{
            return Response::json(0,'没有相对应的id 数据');
        }


    }

    public function actionDelete($id)
    {
        $model = Article::findOne([
            'id' => $id,
            'store_id' => $this->store->id,
        ]);
        if ($model) {
            $model->is_delete = 1;
            if (!$model->save()) {
                $this->renderJson((new Model())->getModelError($model));
            }
        }
        $this->renderJson([
            'code' => 0,
            'msg' => '删除成功',
        ]);
    }

}