<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eye_card".
 *
 * @property string $id
 * @property string $title
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
            [['title'], 'required'],
            [['title'], 'string', 'max' => 50],
        ];
    }
	
	public static function getById($id)
	{
		return self::find()->where(['id'=>$id])->limit(1)->one();
	}
    public static function del($id)
    {
        $model = EyeRecordLog::find()->where(['eye_card_id'=>$id])->one();
        if(!$model){
            $model = self::getById($id);
            if($model){
                if($model->delete()){
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '名称',
        ];
    }
}
