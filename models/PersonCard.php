<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_card".
 *
 * @property int $id
 * @property string $title
 * @property string $tip
 * @property int $type 卡的类型：1:家长，2：学生，3：老人
 * @property int $is_del 1:删除
 */
class PersonCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%person_card}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'tip'], 'required'],
            [['type'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['tip'], 'string', 'max' => 128],
        ];
    }

    public static function getById($id)
    {
        return self::find()->where(['id'=>$id])->limit(1)->one();
    }
    public static function del($id)
    {
        $model = self::getById($id);
        if($model){
            $model->is_del = 1;
            if($model->save()){
                return true;
            }
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '名称',
            'tip' => '小提示',
            'type' => '卡的类型',
            'is_del' => 'Is Del',
        ];
    }
}
