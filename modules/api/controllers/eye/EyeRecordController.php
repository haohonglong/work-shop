<?php


namespace app\modules\api\controllers\eye;

use yii\db\Query;
use app\helper\Response;
use app\models\EyeRecord;
use app\models\EyeRecordForm;
use yii;

class EyeRecordController extends BaseController
{
    /**
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionIndex
     * 功能：
     * 说明：
     * 注意：
     * @api {get} /eye/eye-record/index 眼睛健康记录
     * @apiParam {Number} userid
     * @return object
     */
    public function actionIndex($userid=null)
    {
        $data = (new Query())->select('*')->from(EyeRecord::tableName())->where(['user_id'=>$userid,'is_del'=>0])->all();
	    if($data){
		    return Response::json(1,'successfully',$data);
	    }
	    return Response::json(0,'fail',$data);
    }

    /**
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionAdd
     * 功能：
     * 说明：
     * 注意：
     * @api {post} /eye/eye-record/add 眼睛健康记录添加
     * @apiParam {Number} user_id
     * @apiParam {Number} day   天数
     * @apiParam {String} type  症状类型
     * @apiParam {String} method  治疗方法
     * @apiParam {String} feel  感受度
     * @apiParam {String} tip  小提示
     * @return object
     */
    public function actionAdd()
    {
        $request = yii::$app->request;
        $model = new EyeRecord();
        $model->type = $request->post('type');
        $model->user_id = $request->post('user_id');
        $model->day = $request->post('day');
        $model->method = $request->post('method');
        $model->feel = $request->post('feel');
        $model->tip = $request->post('tip');
        if ($model->validate() && $model->save()) {
	        return Response::json(1,'successfully');
        }
	    return Response::json(0,'fail');
    }

    /**
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionEdit
     * 功能：
     * 说明：
     * 注意：
     * @api {post} /eye/eye-record/edit 眼睛健康记录修改
     * @apiParam {Number} id
     * @apiParam {Number} day   天数
     * @apiParam {String} type  症状类型
     * @apiParam {String} method  治疗方法
     * @apiParam {String} feel  感受度
     * @apiParam {String} tip  小提示
     * @return object
     */
    public function actionEdit()
    {
        $request = yii::$app->request;
        $model = new EyeRecordForm();
        $model->id = $request->post('id');
        $model->type = $request->post('type');
        $model->day = $request->post('day');
        $model->method = $request->post('method');
        $model->feel = $request->post('feel');
        $model->tip = $request->post('tip');
        if ($model->edit()) {
            return Response::json(1,'successfully');
        }
	    return Response::json(0,'fail');

    }

    public function actionDel()
    {
        $request = yii::$app->request;
        $id = $request->post('id');
        if(EyeRecord::del($id)){
	        return Response::json(1,'successfully');
        }
	    return Response::json(0,'fail');
    }


}