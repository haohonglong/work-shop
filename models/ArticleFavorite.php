<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article_favorite}}".
 *
 * @property string $id
 * @property int $article_id
 * @property int $userid
 */
class ArticleFavorite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_favorite}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'userid'], 'required'],
            [['article_id', 'userid'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'userid' => 'Userid',
        ];
    }
}
