<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ushop_world_person".
 *
 * @property string $degrees 鐪肩潧搴︽暟
 * @property string $population 浜哄彛鏁伴噺
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
