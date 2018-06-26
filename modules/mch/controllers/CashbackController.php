<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 23/06/2018
 * Time: 12:58 PM
 */

namespace app\modules\mch\controllers;

use app\helper\Response;
use app\models\Cashback;
use app\models\CashbackForm;
use app\models\User;
use yii\db\Query;
use yii;

//政府返现
class CashbackController extends Controller
{

    public function actionIndex($status=0)
    {
        $arr = [0,1,2,3,4];
        if(!in_array($status,$arr)){
            return $this->redirect(['index','status'=>0]);
        }
        $query = (new Query())
            ->select('u.id as uid,u.nickname')
            ->addSelect('c.id,c.create_at,c.status')
            ->from(['u'=>User::tableName()])
            ->leftJoin(['c'=>Cashback::tableName()],'c.userid = u.id');
        $query
            ->where(['u.is_delete'=>0])
            ->andWhere(['not',['u.level'=>-1]]);
        if($status != 0){
            $query->andWhere(['c.status'=>$status]);
        }
        $data = $query->all();
        if(0 == $status) {
            foreach ($data as $k => $v) {
                if (isset($v['id'])) {
                    unset($data[$k]);
                }

            }
        }


        $data = json_encode(array_values($data));

        return $this->render('index', [
            'list' => $data,
            'status' => $status,
        ]);
    }

    public function actionGetPicsById($id)
    {
        $data = (new Query())
            ->select('pics')
            ->from(Cashback::tableName())
            ->where(['id'=>$id])
            ->one();

        return Response::json(1,'successfully',json_decode($data['pics'],true));

    }

    public function actionApply($userid=null)
    {
        $request = yii::$app->request;
        $user = Cashback::find()->where(['userid'=>$userid])->limit(1)->one();
        if(!$user && User::isVip($userid)){//用户没申请且是vip
            if($request->isPost){
                $model = new CashbackForm();
                $model->attributes = $request->post();
                $model->userid = $userid;

                if($model->apply()){
                    return $this->renderJson([
                        'code' => 0,
                        'msg' => '保存成功',
                    ]);
                }
                return $this->renderJson([
                    'code' => -1,
                    'msg' => '保存失败',
                ]);

            }else{
                return $this->render('apply', [
                    'userid'=>$userid,
                ]);
            }


        }else{
            return $this->redirect('index');
        }

    }

    public function actionCheck($id,$status)
    {
        if(CashbackForm::check($id,$status)){
            return $this->redirect('index');
        }
    }


}