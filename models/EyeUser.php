<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%eye_user}}".
 *
 * @property string $userid
 * @property string $name 患者真实姓名
 * @property int $age
 * @property int $ill_age 近视多久
 * @property string $creat_at
 * @property string $modify_at
 * @property int $pc_id 家庭卡包-person_card
 * @property string $phone 电话号码
 * @property string $f_id 家庭号
 * @property int $f_type 家庭成员特征：1:父母，2：孩子，3：老人
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
            [['userid'], 'required'],
            [['userid', 'age', 'ill_age', 'pc_id', 'f_type'], 'integer'],
            [['creat_at', 'modify_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['phone', 'f_id'], 'string', 'max' => 16],
            [['userid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'name' => 'Name',
            'age' => 'Age',
            'ill_age' => 'Ill Age',
            'creat_at' => 'Creat At',
            'modify_at' => 'Modify At',
            'pc_id' => 'Pc ID',
            'phone' => 'Phone',
            'f_id' => 'F ID',
            'f_type' => 'F Type',
        ];
    }
}
