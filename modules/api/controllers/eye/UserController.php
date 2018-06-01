<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/5/31
 * Time: 15:38
 */

namespace app\modules\api\controllers\eye;


use app\helper\Response;
use app\modules\api\models\LoginForm;

class UserController extends BaseController
{

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post(),'')) {
            $data = $model->login();
            return Response::json($data['code'],$data['msg'],$data['data']);
        }
        return Response::json(0,'登录失败，请检查账号密码是否正确');
    }
}