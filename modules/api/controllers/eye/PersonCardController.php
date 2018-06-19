<?php
namespace app\modules\api\controllers\eye;

use app\models\User;
use yii;
use app\helper\Response;
use app\models\PersonCard;
use app\models\PersonCardForm;
use yii\db\Query;



class PersonCardController extends BaseController
{
    /**
     * @author lhh
     * 创建日期：2018-06-19
     * 修改日期：2018-06-19
     * 名称：actionIndex
     * 功能：
     * 说明：
     * 注意：
     * @api {post} /eye/person-card/index 显示人员卡
     * @return object
     */
    function actionIndex()
    {
        $data = (new Query())
            ->select('*')
            ->from(['p'=>PersonCard::tableName()])
            ->where(['p.is_del'=>0])->all();
        if($data){
	        return Response::json(1,'successfully',$data);
        }
	    return Response::json(0,'fail');
    }


}