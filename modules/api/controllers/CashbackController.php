<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 23/06/2018
 * Time: 12:58 PM
 */

namespace app\modules\api\controllers;

use yii;
use app\modules\api\controllers\eye\BaseController;

//政府返现
class CashbackController extends BaseController
{
    public function actionIndex()
    {
        $request = yii::$app->request;
        if($request->isPost){

        }
    }
}