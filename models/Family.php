<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%family}}".
 *
 * @property string $id 手机号
 * @property string $name
 */
class Family extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%family}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 16,'min'=>11],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '手机号',
            'name' => '备注说明',
        ];
    }
}
