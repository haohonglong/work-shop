<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eye_record".
 *
 * @property int $id
 * @property string $type 眼疾类型
 * @property string $day 治疗时长
 * @property string $method 治疗方法
 * @property string $feel 感受
 * @property string $date
 * @property string $tip 护眼小贴士
 * @property int $user_id
 * @property int $is_del 1:删除
 */
class EyeRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eye_record}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['tip'], 'string'],
            [['user_id'], 'required'],
            [['user_id', 'is_del'], 'integer'],
            [['type'], 'string', 'max' => 50],
            [['day'], 'string', 'max' => 20],
            [['method'], 'string', 'max' => 255],
            [['feel'], 'string', 'max' => 30],
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
            'type' => 'Type',
            'day' => 'Day',
            'method' => 'Method',
            'feel' => 'Feel',
            'date' => 'Date',
            'tip' => 'Tip',
            'user_id' => 'User ID',
            'is_del' => 'Is Del',
        ];
    }
}
