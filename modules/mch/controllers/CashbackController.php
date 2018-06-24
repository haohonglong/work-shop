<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 23/06/2018
 * Time: 12:58 PM
 */

namespace app\modules\mch\controllers;

use app\helper\Response;
use app\models\Cashback;
use app\models\User;
use yii;

//政府返现
class CashbackController extends Controller
{

    public function actionUpload()
    {
        $request = yii::$app->request;
        $model = new Cashback();
        if ($request->isPost) {
            $model->attributes = $request->post();
            if(User::isVip($model->userid)){
                $model->save();
                return Response::json(1,'上传成功');
            }else{
                return Response::json(0,'非vip用户');
            }


        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}