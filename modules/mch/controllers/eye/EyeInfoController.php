<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 26/05/2018
 * Time: 3:40 PM
 */

namespace app\modules\mch\controllers\eye;

use app\helper\Response;
use app\modules\mch\controllers\Controller;

use app\models\User;
use yii;
use yii\db\Query;
use app\models\EyeInfo;
use yii\data\Pagination;

class EyeInfoController extends Controller
{
    /**
     * type{integer} 根据人员卡类型，获取所有人眼的信息
     * @return object
     */
    public function actionIndex()
    {
	    $request = yii::$app->request;
	    $type = $request->get('type');
	    $query = User::find()
		    ->select('u.id as user_id,u.sex,u.username,u.age,u.avatar_url,u.family_type')
		    ->addSelect('e.*')
		    ->from(User::tableName().' as u')
		    ->innerJoin(EyeInfo::tableName().' as e','e.user_id = u.id')
		    ->where(['e.is_del'=>0]);
	    if($type){
	        $query->andWhere(['u.family_type'=>$type]);
        }
		if($query){
			$count = $query->count();
			$pagination = new Pagination(['totalCount' => $count]);
			
			$data = $query->offset($pagination->offset)
				->asArray()
				->limit($pagination->limit)
				->all();
			$var =[
				'data'=>$data,
				'pagination'=>$pagination,
			];
			return $this->render('index',$var);
		}else{
			
		}
    }

    public function actionAdd()
    {
        $request = yii::$app->request;
        $model = new EyeInfo();
        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['eye/eye-info/count']);
        }
        $var =[
            'model'=>$model
        ];
        return $this->render('add',$var);
    }

    public function actionEdit($id)
    {
        $request = yii::$app->request;
        $model = EyeInfo::getById($id);
        if($model){
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['eye/eye-info/count']);
            }
            $var =[
                'model'=>$model
            ];
            return $this->render('edit',$var);
        }
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
     * 显示图表
     * @return object
     */
    public function actionCount()
    {
        return $this->render('chart');
    }
}