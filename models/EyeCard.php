<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eye_card".
 *
 * @property string $id
 * @property string $title
 * @property string $day
 * @property integer $is_del
 */
class EyeCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%eye_card}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'day'], 'required'],
            [['is_del','status'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['day'], 'string', 'max' => 3],
        ];
    }
	
	public static function getById($id)
	{
		return self::find()->where(['id'=>$id])->limit(1)->one();
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'day' => 'Day',
            'is_del' => 'Is Del',
        ];
    }
}