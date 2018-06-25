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
        if(0 == $status){
            foreach ($data as $k => $v){
                if(isset($v['id'])){
                    unset($data[$k]);
                }
            }
        }

        return $this->render('index', [
            'list' => $data,
            'status' => $status,
        ]);
    }

    public function actionApply($userid=null)
    {
        $request = yii::$app->request;
        if(User::isVip($userid)){
            if($request->isPost){
                $model = new CashbackForm();
                $model->attributes = $request->post();
                $model->userid = $userid;

                if($model->apply()){
                    return Response::json(1,'1');
                }
                return Response::json(0,'1');

            }else{
                return $this->render('apply', [
                    'userid'=>$userid,
                ]);
            }


        }

    }


}