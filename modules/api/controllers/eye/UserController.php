<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/5/31
 * Time: 15:38
 */

namespace app\modules\api\controllers\eye;

use yii;
use app\helper\Response;
use app\models\EyeUser;
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
    public function actionRegister()
    {
        $eyeUser = new EyeUser();
        if($eyeUser->load(yii::$app->request->post(),'') && $eyeUser->validate()){
            $eyeUser->password = Yii::$app->getSecurity()->generatePasswordHash($eyeUser->password);
            if($eyeUser->save()){
                return Response::json(1,'successfully');
            }
        }
        return Response::json(0,'fail');
    }
}