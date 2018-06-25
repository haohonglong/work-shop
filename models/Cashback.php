<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cashback}}".
 *
 * @property string $id
 * @property int $userid 哪个人申请返现
 * @property int $status 1：审核中，2：审核失败,3:审核通过，4:已经返现
 * @property string $pic_list 所有场景图片,json 格式
 * @property string $pic_optometry_list 验光单图片
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
            [['userid', 'pic_list', 'pic_optometry_list'], 'required'],
            [['userid', 'status'], 'integer'],
            [['pic_list', 'pic_optometry_list', 'remark'], 'string'],
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
            'pic_list' => 'Pic List',
            'pic_optometry_list' => 'Pic Optometry List',
            'remark' => 'Remark',
            'create_at' => 'Create At',
            'modify_at' => 'Modify At',
        ];
    }
}
