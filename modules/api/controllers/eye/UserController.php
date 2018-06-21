<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/5/31
 * Time: 15:38
 */

namespace app\modules\api\controllers\eye;

use app\models\Family;
use app\models\User;
use yii;
use app\helper\Response;
use app\models\EyeUser;

class UserController extends BaseController
{
    /**
     * @author lhh
     * 创建日期：2018-06-20
     * 修改日期：2018-06-20
     * 名称：actionIndex
     * 功能：
     * 说明：
     * 注意：
     * @api {get} /eye/user/index/ 显示个人信息
     * @apiParam {Number} userid    用户ID
     * @return object
     */
    public function actionIndex($userid)
    {
        $query = (new yii\db\Query())
            ->select('eu.name,eu.age,eu.ill_age,eu.phone,eu.f_id,eu.f_type')
            ->addSelect('u.id,u.nickname,u.level')
            ->from(['u'=>User::tableName()])
            ->leftJoin(['eu'=>EyeUser::tableName()],'eu.userid = u.id')
            ->where(['u.id'=>$userid]);
        $data = $query->one();
        if($data){
            return Response::json(1,'successfully',$data);
        }
        return Response::json(0,'fail');
    }

    /**
     * @author lhh
     * 创建日期：2018-06-21
     * 修改日期：2018-06-21
     * 名称：actionList
     * 功能：
     * 说明：
     * 注意：
     * @api {get} /eye/user/list/ 列出家庭所有成员
     * @apiParam {Number} id    家庭ID
     * @return object
     */
    public function actionList()
    {
        $request = yii::$app->request;
        $id = $request->get('id');
        $query = (new yii\db\Query())
            ->select('u.id,u.gender,u.nickname,u.avatar_url,eu.name')
            ->from(['eu'=>EyeUser::tableName()])
            ->leftJoin(['u'=>User::tableName()],'u.id = eu.userid')
            ->where(['eu.f_id'=>$id]);
        $data = $query->all();
        if($data){
            return Response::json(1,'successfully',$data);
        }
        return Response::json(0,'fail');
    }
    /**
     * @author lhh
     * 创建日期：2018-06-20
     * 修改日期：2018-06-20
     * 名称：actionEdit
     * 功能：
     * 说明：
     * 注意：
     * @api {post} /eye/user/modify/ 修改个人信息
     * @apiParam {Number} userid    用户ID
     * @apiParam {Number} age       年龄
     * @apiParam {Number} ill_age   近视几年了
     * @apiParam {Number} f_type    家庭成员特征：1:父母，2：孩子，3：老人
     * @apiParam {String} name      用户真实姓名
     * @apiParam {String} phone     联系手机号码
     * @return object
     */
    public function actionModify()
    {
        $request = yii::$app->request;
        if($request->isPost){
            $userid = $request->post('userid');
            $eyeuser = EyeUser::find()->where(['userid'=>$userid])->limit(1)->one();
            if($eyeuser){
                $eyeuser->age = $request->post('age');
                $eyeuser->ill_age = $request->post('ill_age');
                $eyeuser->f_type = $request->post('f_type');
                $eyeuser->name = $request->post('name');
                $eyeuser->phone = $request->post('phone');
                $eyeuser->modify_at = date('Y-m-d H:i:s');
                $eyeuser->save();
                return Response::json(1,'successfully');
            }
        }
        return Response::json(0,'fail');
    }

}