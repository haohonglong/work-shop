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

    /**
     * @author lhh
     * 创建日期：2018-06-13
     * 修改日期：2018-06-13
     * 名称：actionCreate
     * 功能：创建家庭，同时把当前用户添加到eyeuser 表里
     * 说明：
     * 注意：
     * @return object
     */
    public function actionCreate()
    {
        $request = yii::$app->request;
        if ($request->isPost) {
            $userid = $request->post('userid');
            $id = str_replace(' ', '',$request->post('id'));
            $name = $request->post('name','');
            $user = User::find()->where(['id'=>$userid])->limit(1)->one();
            if($user){
                //家庭是否已存在了
                if(Family::findOne(['id'=>$id])){
                    return Response::json(0,'家庭号已存在');
                }else{
                    $family = new Family();
                    $family->id = $id;
                    $family->name = $name;
                    $family->save();
                    //家庭id添加到用户里
                    $eyeuser = EyeUser::find()->where(['userid'=>$userid])->limit(1)->one();
                    if(!$eyeuser){
                        $eyeuser = new EyeUser();
                        $eyeuser->f_id = $family->id;
                        $eyeuser->userid = $userid;
                        $eyeuser->save();
                    }
                    return Response::json(1,'successfully');
                }
            }else{
                return Response::json(0,'用户还没有登录');
            }
        }
        return Response::json(0,'fail');

    }

    /**
     * @author lhh
     * 创建日期：2018-06-13
     * 修改日期：2018-06-13
     * 名称：actionAddMember
     * 功能：添加家庭成员
     * 说明：
     * 注意：
     */
    public function actionAddMember()
    {
        $request = yii::$app->request;
        if ($request->isPost) {
            $userid = $request->post('userid');
            $f_id = str_replace(' ', '',$request->post('f_id'));
            $user = User::find()->where(['id'=>$userid])->limit(1)->one();
            if($user){
                //家庭是否已存在了
                if(!Family::findOne(['id'=>$f_id])){
                    return Response::json(0,'家庭不存在，先要去创建家庭');
                }else{
                    $member = new EyeUser();
                    if($member->load($request->post(),'')){
                        $member->f_id = $f_id;
                        $member->userid = 0;//被创建的用户，不是登录进来的
                        $member->save();
                        return Response::json(1,'家庭人员创建成功');
                    }
                }
            }else{
                return Response::json(0,'用户还没有登录');
            }
        }
        return Response::json(0,'fail');
    }

    public function actionEditMember()
    {
        $request = yii::$app->request;
        if ($request->isPost) {
            $id = $request->post('id');
            if($id){
                $userid = $request->post('userid');
                $user = User::find()->where(['id'=>$userid])->limit(1)->one();
                if($user){
                    $member = EyeUser::find()->where(['id'=>$id])->limit(1)->one();
                    $f_id = $member->f_id;
                    $userid = $member->userid;
                    if($member->load($request->post(),'')){
                        $member->userid = $userid;
                        $member->f_id = $f_id;//家庭id不能被修改
                        $member->save();
                        return Response::json(1,'家庭人员修改成功');
                    }
                }else{
                    return Response::json(0,'用户还没有登录');
                }
            }else{
                return Response::json(0,'缺少参数id');
            }

        }
        return Response::json(0,'fail');
    }



}