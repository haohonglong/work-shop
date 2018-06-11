<?php
/**
 * User: Xany <762632258@qq.com>
 * Date: 2017/8/18
 * Time: 14:17
 */

namespace app\modules\api\controllers;

use app\helper\Response;
use app\models\EyeUserWithRelation;
use app\modules\api\controllers\eye\BaseController;
use yii;
use app\models\Article;
use app\modules\mch\models\Model;

class ArticleController extends BaseController
{
    /**
     * @author lhh
     * 创建日期：2018-06-11
     * 修改日期：2018-06-11
     * 名称：actionList
     * 功能：优瞳文章
     * 说明：
     * 注意：
     * @param int $cat_id
     * @return object
     */
    public function actionList($cat_id = 4)
    {
        $list = Article::find()->select('id,title,content,addtime,pic_url')->where([
            'article_cat_id' => $cat_id,
            'is_delete' => 0,
        ])->orderBy('sort ASC,addtime DESC')->all();
        $arr = [];
        foreach ($list as $v){
            $arr[]=[
              'id'=>$v['id'],
              'title'=>$v['title'],
              'content'=>$v['content'],
              'pic_url'=>$v['pic_url'],
              'time'=>date("Y-m-d H:i:s", $v['addtime']),
            ];
        }
        $list = $arr;
        if (!empty($list) && 4 == $cat_id) {
            return Response::json(1,'successfully',$list);
        }
        return Response::json(0,'fail');
    }

    /**
     * @author lhh
     * 创建日期：2018-06-11
     * 修改日期：2018-06-11
     * 名称：actionDetail
     * 功能：
     * 说明：
     * 注意：
     * @param int $id
     * @return object
     */
    public function actionDetail($id = 1)
    {
        $article = Article::find()->select('id,title,content,addtime,pic_url')->where([
            'id' => $id,
            'is_delete' => 0,
        ])->one();
        $arr=[
            'id'=>$article['id'],
            'title'=>$article['title'],
            'content'=>$article['content'],
            'pic_url'=>$article['pic_url'],
            'time'=>date("Y-m-d H:i:s", $article['addtime']),
        ];
        $article = $arr;

        if (!empty($article)) {
            return Response::json(1,'successfully',$article);
        }
        return Response::json(0,'fail');
    }



}