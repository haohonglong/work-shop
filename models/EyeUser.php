<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%eye_user}}".
 *
 * @property string $id
 * @property string $name
 * @property int $age
 * @property int $how_long 近视多久
 * @property string $creat_at
 * @property string $modify_at
 * @property int $userid 用户
 * @property int $pc_id 家庭卡包-person_card
 * @property string $f_id 家庭
 * @property int $is_delete
 */
class EyeUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eye_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'how_long', 'userid', 'pc_id', 'is_delete'], 'integer'],
            [['creat_at', 'modify_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['f_id'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'how_long' => 'How Long',
            'creat_at' => 'Creat At',
            'modify_at' => 'Modify At',
            'userid' => 'Userid',
            'pc_id' => 'Pc ID',
            'f_id' => 'F ID',
            'is_delete' => 'Is Delete',
        ];
    }
}
