<?php
/**
 * User: Xany <762632258@qq.com>
 * Date: 2017/8/18
 * Time: 14:17
 */

namespace app\modules\api\controllers;

use app\helper\Response;
use app\models\ArticleFavorite;
use app\models\EyeUserWithRelation;
use app\models\User;
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
              'content'=>yii\helpers\Html::decode($v['content']),
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
            'content'=>yii\helpers\Html::decode($article['content']),
            'pic_url'=>$article['pic_url'],
            'time'=>date("Y-m-d H:i:s", $article['addtime']),
        ];
        $article = $arr;

        if (!empty($article)) {
            return Response::json(1,'successfully',$article);
        }
        return Response::json(0,'fail');
    }

    /**
     * @author lhh
     * 创建日期：2018-06-13
     * 修改日期：2018-06-13
     * 名称：actionAddFavorite
     * 功能：收藏文章
     * 说明：
     * 注意：
     * @return object
     */
    public function actionAddFavorite()
    {
        $requery = yii::$app->request;
        $userid = $requery->post('userid');
        $article_id = $requery->post('article_id');
        $user = User::find()->where(['id'=>$userid])->limit(1)->one();
        if($user){
            $article = Article::find()->where(['id'=>$article_id])->limit(1)->one();
            if($article){
                $favorite = ArticleFavorite::find()->where(['userid'=>$userid,'article_id'=>$article_id])->one();
                if(!$favorite){
                    $favorite = new ArticleFavorite();
                    $favorite->article_id = $article_id;
                    $favorite->userid = $userid;
                    $favorite->save();
                    return Response::json(1,'文章收藏成功');
                }else{
                    return Response::json(0,'此篇文章之前已被收藏');
                }
            }else{
                return Response::json(0,'没有这篇文章');
            }
        }
        return Response::json(0,'没有这个用户');
    }

    /**
     * @author lhh
     * 创建日期：2018-06-13
     * 修改日期：2018-06-13
     * 名称：actionDelFavorite
     * 功能：取消文章收藏
     * 说明：
     * 注意：
     * @return object
     * @throws \Throwable
     * @throws yii\db\StaleObjectException
     */
    public function actionDelFavorite()
    {
        $requery = yii::$app->request;
        $userid = $requery->post('userid');
        $article_id = $requery->post('article_id');
        $user = User::find()->where(['id'=>$userid])->limit(1)->one();
        if($user){
            $favorite = ArticleFavorite::find()->where(['userid'=>$userid,'article_id'=>$article_id])->one();
            if($favorite){
                $favorite->delete();
                return Response::json(1,'您已取消了这篇文章的收藏');
            }else{
                return Response::json(0,'没有这篇文章');
            }
        }
        return Response::json(0,'没有这个用户');
    }

    /**
     * @author lhh
     * 创建日期：2018-06-13
     * 修改日期：2018-06-13
     * 名称：actionShowFavorite
     * 功能：显示用户收藏的所有文章
     * 说明：
     * 注意：
     * @param null $userid
     * @return object
     */
    public function actionShowFavorite($userid=null)
    {
        $user = User::find()->where(['id'=>$userid])->limit(1)->one();
        if($user){
            $favorite = (new yii\db\Query())->from(['u'=>User::tableName()])
                ->leftJoin(['af'=>ArticleFavorite::tableName()],'af.userid = u.id')
                ->leftJoin(['a'=>Article::tableName()],'af.article_id = a.id')
                ->where(['af.userid'=>$userid])
                ->all();
            if($favorite){
                return Response::json(1,'successfully',$favorite);
            }else{
                return Response::json(0,'没有这篇文章');
            }
        }
        return Response::json(0,'没有这个用户');
    }







}