<?php


namespace app\modules\api\controllers\eye;

use yii\db\Query;
use app\helper\Response;
use app\models\EyeRecord;
use app\models\EyeRecordForm;
use yii;

class EyeRecordController extends BaseController
{
    public function actionIndex()
    {
        $data = (new Query())->select('*')->from(EyeRecord::tableName())->where(['is_del'=>0])->all();
	    if($data){
		    return Response::json(1,'成功',$data);
	    }
	    return Response::json(0,'成功',$data);
    }

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
        $date = $request->post('date');
        if($date){$model->date = $date;}
        if ($model->validate() && $model->save()) {
	        return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }

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
            return Response::json(1,'成功');
        }
	    return Response::json(0,'修改失败');

    }

    public function actionDel()
    {
        $request = yii::$app->request;
        $id = $request->post('id');
        if(EyeRecord::del($id)){
	        return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }


}