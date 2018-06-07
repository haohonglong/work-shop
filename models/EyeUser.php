<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%eye_user}}".
 *
 * @property string $id
 * @property string $username
 * @property string $gender 用户的性别，值为1时是男性，值为2时是女性，值为0时是未知
 * @property string $family_type 成员特征：1:家长，2：学生，3：老人
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $wechat_open_id 微信openid
 * @property string $wechat_union_id 微信用户union id
 * @property string $nickname 昵称
 * @property int $age
 * @property string $patient_age 患龄
 * @property string $avatarUrl 头像url
 * @property int $addtime 创建日期
 * @property int $edittime 修改日期
 * @property string $family_id 成员属于哪个家庭的
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
            [['username', 'gender', 'password', 'authKey', 'accessToken', 'age', 'avatarUrl'], 'required'],
            [['age', 'addtime', 'edittime', 'family_id', 'is_delete'], 'integer'],
            [['avatarUrl'], 'string'],
            [['username', 'password', 'authKey', 'accessToken', 'wechat_open_id', 'wechat_union_id', 'nickname'], 'string', 'max' => 255],
            [['gender', 'family_type'], 'string', 'max' => 1],
            [['patient_age'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'gender' => 'Gender',
            'family_type' => 'Family Type',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'wechat_open_id' => 'Wechat Open ID',
            'wechat_union_id' => 'Wechat Union ID',
            'nickname' => 'Nickname',
            'age' => 'Age',
            'patient_age' => 'Patient Age',
            'avatarUrl' => 'Avatar Url',
            'addtime' => 'Addtime',
            'edittime' => 'Edittime',
            'family_id' => 'Family ID',
            'is_delete' => 'Is Delete',
        ];
    }
}
