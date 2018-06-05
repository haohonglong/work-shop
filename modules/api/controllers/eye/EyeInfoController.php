<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 26/05/2018
 * Time: 3:40 PM
 */

namespace app\modules\api\controllers\eye;

use app\helper\Date;
use app\models\EyeInfoForm;
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
        $model = new EyeInfoForm();
        if ($model->load($request->post(),'') && $model->save()) {
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
        $id = $request->post('id');
        if($id){
            $model = new EyeInfoForm();
            if ($model->load($request->post(),'') && $model->edit($id)) {
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
            if(count($date) < 3){//按几年内筛选
                $arr = Date::getYear($date);
                $query->where(['between','date',$arr[0],$arr[1]]);
            }else{
                $query->where('year(date) = :date',[':date'=>$date]);
            }
        }
        $data = $query->all();
        if($data){
            $arr = [];
            $arr2 = [];
            $degrees = [];
            $population = [];
            foreach ($data as $k => $item){
                if(!isset($arr2[$item['degrees']])){
                    $arr2[$item['degrees']] = 0;
                }
                $arr2[$item['degrees']]++;

                $arr['num_R'][]=$item['num_R'];
                $arr['num_L'][]=$item['num_L'];
            }

            foreach ($arr2 as $key =>$value){
                $degrees[] = $key;
                $population[] = $value;
            }

            $arr['degrees'] = $degrees;
            $arr['population'] = $population;

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