<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ushop_world_person".
 *
 * @property string $degrees 眼睛度数
 * @property string $population 人口数量
 */
class WorldPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ushop_world_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['degrees', 'population'], 'required'],
            [['degrees', 'population'], 'integer'],
            [['degrees'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'degrees' => '眼睛度数',
            'population' => '人口数量',
        ];
    }
}
