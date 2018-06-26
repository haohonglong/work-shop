<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cashback}}".
 *
 * @property string $id
 * @property int $userid 哪个人申请返现
 * @property int $status 1：审核中，2：审核失败,3:审核通过，4:已经返现
 * @property string $pics 所有场景图片和验光单图片,json 格式
 * @property string $remark 备注
 * @property string $create_at
 * @property string $modify_at
 */
class Cashback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cashback}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'pics'], 'required'],
            [['userid', 'status'], 'integer'],
            [['pics', 'remark'], 'string'],
            [['create_at', 'modify_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'status' => 'Status',
            'pics' => 'Pics',
            'remark' => 'Remark',
            'create_at' => 'Create At',
            'modify_at' => 'Modify At',
        ];
    }
}
