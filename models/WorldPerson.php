<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%world_person}}".
 *
 * @property string $degrees 眼镜度数
 * @property string $population 人口统计数
 */
class WorldPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%world_person}}';
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
            'degrees' => 'Degrees',
            'population' => 'Population',
        ];
    }
}
