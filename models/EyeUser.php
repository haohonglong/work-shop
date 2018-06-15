<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%eye_user}}".
 *
 * @property string $id
 * @property string $name 患者真实姓名
 * @property int $age
 * @property int $ill_age 近视多久
 * @property string $creat_at
 * @property string $modify_at
 * @property int $userid 用户,0：被登录用户创建的，不是登录者本人
 * @property string $guardian 监护人
 * @property string $job 职业
 * @property int $pc_id 家庭卡包-person_card
 * @property string $phone 电话号码
 * @property string $f_id 家庭
 * @property int $f_type 家庭成员特征：1:家长，2：学生，3：老人
 * @property int $level 0:普通，1:vip
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
            [['age', 'ill_age', 'userid', 'pc_id', 'f_type', 'level', 'is_delete'], 'integer'],
            [['creat_at', 'modify_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['guardian', 'job'], 'string', 'max' => 128],
            [['phone', 'f_id'], 'string', 'max' => 16],
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
            'ill_age' => 'Ill Age',
            'creat_at' => 'Creat At',
            'modify_at' => 'Modify At',
            'userid' => 'Userid',
            'guardian' => 'Guardian',
            'job' => 'Job',
            'pc_id' => 'Pc ID',
            'phone' => 'Phone',
            'f_id' => 'F ID',
            'f_type' => 'F Type',
            'level' => 'Level',
            'is_delete' => 'Is Delete',
        ];
    }
}
