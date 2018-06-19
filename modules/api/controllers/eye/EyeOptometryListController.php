<?php

namespace app\modules\api\controllers\eye;

use yii;
use app\helper\Response;
use app\models\EyeOptometryList;
use app\models\EyeOptometryListForm;
use app\models\EyeUser;
use app\models\User;

class EyeOptometryListController extends BaseController
{
    /**
     * type{integer} 根据人员卡类型，获取所有人眼的信息
     * @return object
     */
    public function actionIndex()
    {
        $request = yii::$app->request;
        $query = EyeUser::find();
        $query->alias('eu')
            ->select('eu.*')
            ->addSelect('e.*')
            ->leftJoin(['e'=>EyeOptometryList::tableName()],'e.user_id = eu.id')
            ->leftJoin(['u'=>User::tableName()],'eu.userid = u.id')
            ->orderBy('e.id DESC')
            ->asArray()
            ->where(['eu.is_delete'=>0]);

            $data = $query->all();

        if($data){
            return Response::json(1,'successfully',$data);
        }
        return Response::json(0,'没有匹配的数据');
    }

    public function actionAdd()
    {
        $request = yii::$app->request;
        if($request->isPost){
            $model = new EyeOptometryListForm();
            if($model->load($request->post(),'') && $model->save()){
                return Response::json(1,'successfully');
            }
            return Response::json(0,'fail');
        }

    }
    public function actionEdit()
    {
        $request = yii::$app->request;
        if($request->isPost){
            $id = $request->post('id');
            $model = EyeOptometryList::find()->where(['id'=>$id])->limit(1)->one();
            if($model->load($request->post(),'')){
                if($model->save()){
                    return Response::json(1,'successfully');
                }
            }
            return Response::json(0,'fail');
        }
    }

}