<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 23/06/2018
 * Time: 12:58 PM
 */

namespace app\modules\api\controllers;

use app\helper\Response;
use app\models\Cashback;
use app\models\CashbackForm;
use app\models\User;
use yii;
use app\modules\api\controllers\eye\BaseController;

//政府返现
class CashbackController extends BaseController
{
    /**
     * @author lhh
     * 创建日期：2018-06-26
     * 修改日期：2018-06-26
     * 名称：actionApply
     * 功能：
     * 说明：
     * 注意：
     * @api {post} /cashback/apply 申请政府返现
     * @apiParam {Number} userid  用户ID
     * @apiParam {Array} pic_list  上传场景的图片
     * @apiParamExample {Array} pic_list:
     *       [
     *         {"pic_url":"http:\/\/youtong.shop\/uploads\/image\/d4\/d4ed9472d893effc07dce8b394bad1b3.jpg"},
     *         {"pic_url":"http:\/\/youtong.shop\/uploads\/image\/36\/36b6c241664678142fbd77f7f49b7ded.jpg"}
     *          ...
     *      ]
     *
     * @apiParam {String} pic_optometry  上传验光单的图片
     * @apiParam {String} remark  备注
     * @apiGroup Cashback
     * @return object
     */
    public function actionApply()
    {
        $request = yii::$app->request;
        $userid = $request->post('userid');
        $user = Cashback::find()->where(['userid'=>$userid])->limit(1)->one();
        if(!$user){//用户没申请且是vip
            if(User::isVip($userid)){
                if($request->isPost){
                    $model = new CashbackForm();
                    $model->attributes = $request->post();
                    if($model->apply()){
                        return Response::json(1,'申请成功');

                    }
                    return Response::json(0,'申请失败');

                }
            }
            return Response::json(0,'用户不是VIP用户');

        }
        return Response::json(0,'用户已申请过');

    }
}