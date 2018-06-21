<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/6/4
 * Time: 10:36
 */

namespace app\modules\api\controllers\eye;

use app\helper\Response;
use app\models\EyeUser;
use app\models\User;
use yii;
use app\models\Family;

class FamilyController extends BaseController
{

    private $f_id,$userid;
    private function createEyeUser()
    {
        $eyeUser = new EyeUser();
        $eyeUser->f_id = $this->f_id;
        $eyeUser->userid = $this->userid;
        $eyeUser->save();
    }

    /**
     * @author lhh
     * 创建日期：2018-06-13
     * 修改日期：2018-06-13
     * 名称：actionCreate
     * 功能：创建家庭，同时把当前用户添加到eyeuser 表里
     * 说明：
     * 注意：
     * @api {post} /eye/family/create/ 创建家庭号
     * @apiParam {Number} id      家庭号ID
     * @apiParam {Number} name    家庭昵称
     * @apiParam {Number} userid  用户ID
     * @apiGroup Family
     * @apiSuccess {String}  code 0:失败 ;1:成功;2:家庭号不对.
     * @return object
     */
    public function actionCreate()
    {
        $request = yii::$app->request;
        if ($request->isPost) {
            $userid = $request->post('userid');
            $id = str_replace(' ', '',$request->post('id'));
            $this->f_id = $id;
            $this->userid = $userid;
            $name = $request->post('name','');
            $user = User::find()->where(['id'=>$userid])->limit(1)->one();
            if($user){
                $eyeUser = EyeUser::find()->where(['userid'=>$userid])->limit(1)->one();
                if(Family::findOne(['id'=>$id])){//家庭号是否已存在
                    if(!$eyeUser){
                        $this->createEyeUser();
                    }
                    return Response::json(0,'家庭号已存在');
                }else{
                    if(!$eyeUser){//用户是否第一次登录
                        $family = new Family();
                        $family->id = $id;
                        $family->name = $name;
                        $family->save();
                        $this->createEyeUser();
                        return Response::json(1,'successfully');
                    }else{
                        if((isset($eyeUser->f_id) && $eyeUser->f_id != $id)){//用户之前家庭号已存在，跟此次输入的家庭号比对，结果必须一致
                            return Response::json(2,'家庭号不对');
                        }

                    }

                }

            }else{
                return Response::json(0,'用户还没有登录');
            }
        }
        return Response::json(0,'fail');

    }







}