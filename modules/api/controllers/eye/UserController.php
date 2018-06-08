<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/5/31
 * Time: 15:38
 */

namespace app\modules\api\controllers\eye;

use app\helper\Helper;
use app\models\WechatApp;
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
//            $model->user_info = 'test';
//            $model->iv = 'ZmRha2luZWw7aW5qYWpkag==';
//            $model->signature = Helper::getrandomstring(24);
//            $model->encrypted_data = Helper::getrandomstring(24);
            $model->wechat_app = WechatApp::findOne(2);

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