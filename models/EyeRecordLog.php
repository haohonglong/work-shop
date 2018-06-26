<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%eye_record_log}}".
 *
 * @property string $id
 * @property string $create_at 打卡日期
 * @property int $eye_card_id 打卡的id
 * @property int $user_id
 */
class EyeRecordLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eye_record_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['eye_card_id', 'user_id'], 'required'],
            [['eye_card_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_at' => 'Create At',
            'eye_card_id' => 'Eye Card ID',
            'user_id' => 'User ID',
        ];
    }
}
