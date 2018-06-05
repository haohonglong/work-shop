<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%eye_user_with_relation}}".
 *
 * @property int $id
 * @property int $type 1:article，2:video
 * @property string $relation_id
 * @property string $user_id
 */
class EyeUserWithRelation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eye_user_with_relation}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'relation_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类型',
            'relation_id' => '关联id',
            'user_id' => '用户id',
        ];
    }
}
