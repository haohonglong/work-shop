<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 26/05/2018
 * Time: 3:40 PM
 */

namespace app\modules\mch\controllers\eye;

use app\helper\Response;
use app\models\EyeInfoForm;
use app\models\EyeOptometryList;
use app\models\EyeOptometryListForm;
use app\models\EyeUser;
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
	    $query = User::find()
            ->alias('u')
		    ->select('e.*')
		    ->leftJoin(['e'=>EyeOptometryList::tableName()],'e.user_id = u.id')
            ->orderBy('e.id DESC');


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


    public function actionEdit($id=null)
    {
        $request = yii::$app->request;
        $model = EyeOptometryListForm::getById($id);
        if(!$model){
            $model = new EyeOptometryList();
        }
        if($request->isPost){
            $from = new EyeOptometryListForm();
            $from->load($request->post(),'EyeOptometryList');
            if ($from->save($id)) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('edit',[
            'model'=>$model,
            'user_list'=>$this->getUsers(),
        ]);
    }


    public function actionDel($id=null)
    {
        EyeOptometryListForm::del($id);
        return $this->redirect(['index']);
    }

    /**
     * 显示图表
     * @return string
     */
    public function actionCount()
    {
        return $this->render('chart');
    }

    /**
     * 显示世界卫生组织眼镜度数及人口的数据
     * @return string
     */
    public function actionWorldCount()
    {
        return $this->render('worldChart');
    }
}