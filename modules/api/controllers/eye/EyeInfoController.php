<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 26/05/2018
 * Time: 3:40 PM
 */

namespace app\modules\api\controllers\eye;

use app\models\User;
use app\models\WorldPerson;
use yii;
use yii\db\Query;
use app\models\EyeInfo;
use app\helper\Response;

class EyeInfoController extends BaseController
{
    /**
     * type{integer} 根据人员卡类型，获取所有人眼的信息
     * @return object
     */
    public function actionIndex()
    {
    	$request = yii::$app->request;
        $type = $request->post('type');
        $data = (new Query())
            ->select('u.id as user_id,u.sex,u.username,u.age,u.avatar_url,u.family_type')
            ->addSelect('e.*')
            ->from(User::tableName().' as u')
            ->innerJoin(EyeInfo::tableName().' as e','e.user_id = u.id')
            ->where(['e.is_del'=>0,'u.family_type'=>$type])
            ->all();
        if($data){
            return Response::json(1,'成功',$data);
        }
        return Response::json(0,'没有匹配的数据');

    }

    public function actionAdd()
    {
        $request = yii::$app->request;
        $model = new EyeInfo();
        $model->advice = $request->post('advice');
        $model->user_id = $request->post('user_id');
        $model->num_R = $request->post('num_R');
        $model->num_L = $request->post('num_L');
        $model->num_RS = $request->post('num_RS');
        $model->num_LS = $request->post('num_LS');
        $date = $request->post('date');
        if($date){$model->date = $date;}
        if ($model->validate() && $model->save()) {
            return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }

    public function actionTest()
    {

        $data = (new Query())->from(EyeInfo::tableName())->one();
        $advice = $data['advice'];
        for($i=0;$i<500;$i++){
            $model = new EyeInfo();
            $model->advice = $advice;
            $model->user_id = 1;
            $model->num_R = (string)(rand(1,30)/10);
            $model->num_L = (string)(rand(1,30)/10);
            $model->num_RS = (string)(rand(1,-30)/10);
            $model->num_LS = (string)(rand(1,-30)/10);
            $model->save();

        }
    }

    public function actionEdit()
    {
        $request = yii::$app->request;
        $model = EyeInfo::getById($request->post('id'));
        if($model){
            $model->num_R = $request->post('num_R');
            $model->num_L = $request->post('num_L');
            $model->num_RS = $request->post('num_RS');
            $model->num_LS = $request->post('num_LS');
            $date = $request->post('date');
            if($date){
                $model->date = $date;
            }
            $model->advice = $request->post('advice');
            $model->user_id = $request->post('user_id');
            if ($model->validate() && $model->save()) {
	            return Response::json(1,'成功');
            }
	        return Response::json(0,'失败');
        }
        return Response::json('0','没有对应id 信息');

    }

    public function actionDel()
    {
        $request = yii::$app->request;
        $id = $request->post('id');
        if(EyeInfo::del($id)){
	        return Response::json(1,'成功');
        }
	    return Response::json(0,'失败');
    }

    /**
     * 统计眼睛数据 GET
     * @return object
     */
    public function actionCount()
    {
        $date = yii::$app->request->get('date');
        $query = (new Query())->from(EyeInfo::tableName());
        if($date){
            $query->where('year(date) = :date',[':date'=>$date]);
        }
        $data = $query->all();
        if($data){
            $arr = [];
            foreach ($data as $k => $item){
                $arr['degrees']['num_R'][]=$item['num_R'];
                $arr['degrees']['num_L'][]=$item['num_L'];
            }
            return Response::json(1,'',$arr);
        }
        return Response::json(0,'数据获取失败');

    }

    /**
     * 获取世界卫生组织全部数据 GET
     * @return object
     */
    public function actionWorldCount()
    {
        $query = (new Query())->from(WorldPerson::tableName());
        $data = $query->all();
        if($data){
            $arr = [];
            foreach ($data as $k => $item){
                $arr['degrees'][]=$item['degrees'];
                $arr['population'][]=$item['population'];
            }
            return Response::json(1,'',$arr);
        }
        return Response::json(0,'数据获取失败');
    }
}