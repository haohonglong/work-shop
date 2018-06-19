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
     *
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionIndex
     * 功能：
     * 说明：
     * 注意：
     * @api {get} /eye/eye-optometry-list/index 获取验光单信息
     * @apiSuccess {Object} object
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

    /**
     *
     *
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionAdd
     * 功能：
     * 说明：
     * 注意：
     * @api {post} /eye/eye-optometry-list/add 添加验光单
     * @apiParam {Number} user_id  用户id
     * @apiParam {String} VD  镜眼距,单位mm.
     * @apiParam {String} DSL 左球面镜.
     * @apiParam {String} DSR 右球面镜
     * @apiParam {String} DCL 左圆柱镜
     * @apiParam {String} DCR 右圆柱镜
     * @apiParam {String} PDL 左瞳距,单位mm
     * @apiParam {String} PDR 右瞳距,单位mm
     * @apiParam {String} VAL 左裸眼视力
     * @apiParam {String} VAR 右裸眼视力
     * @apiParam {String} CVAL 左矫正视力
     * @apiParam {String} CVAR 右矫正视力
     * @apiParam {String} AL 左眼轴向
     * @apiParam {String} AR 右眼轴向
     * @apiParam {Number} DL 左眼镜的度数
     * @apiParam {Number} DR 右眼镜的度数
     * @apiParam {String} remak 备注
     *
     * @apiSuccess {Number} 1 successfully
     * @apiSuccess {Number} 0 fail
     * @return object
     */
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

    /**
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionEdit
     * 功能：
     * 说明：
     * 注意：
     *
     * @api {post} /eye/eye-optometry-list/edit 修改验光单
     * @apiParam {Number} id
     * @apiParam {Number} user_id  用户id
     * @apiParam {String} VD  镜眼距,单位mm.
     * @apiParam {String} DSL 左球面镜.
     * @apiParam {String} DSR 右球面镜
     * @apiParam {String} DCL 左圆柱镜
     * @apiParam {String} DCR 右圆柱镜
     * @apiParam {String} PDL 左瞳距,单位mm
     * @apiParam {String} PDR 右瞳距,单位mm
     * @apiParam {String} VAL 左裸眼视力
     * @apiParam {String} VAR 右裸眼视力
     * @apiParam {String} CVAL 左矫正视力
     * @apiParam {String} CVAR 右矫正视力
     * @apiParam {String} AL 左眼轴向
     * @apiParam {String} AR 右眼轴向
     * @apiParam {Number} DL 左眼镜的度数
     * @apiParam {Number} DR 右眼镜的度数
     * @apiParam {String} remak 备注
     * @apiSuccess {Number} 1 successfully
     * @apiSuccess {Number} 0 fail
     * @return object
     */
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