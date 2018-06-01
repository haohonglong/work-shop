<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eye_info".
 *
 * @property int $id
 * @property string $num_R 右眼度数
 * @property string $num_L 右眼度数
 * @property string $num_RS 右眼散光
 * @property string $num_LS 左眼散光
 * @property string $date
 * @property string $advice 医生建议
 * @property int $user_id
 * @property int $is_del 1:删除
 */
class EyeInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eye_info}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['advice'], 'string'],
            [['user_id'], 'required'],
            [['user_id', 'is_del'], 'integer'],
            [['num_R', 'num_L', 'num_RS', 'num_LS'], 'string', 'max' => 6],
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
            'num_R' => '右眼度数',
            'num_L' => '左眼度数',
            'num_RS' => '右眼散光度数',
            'num_LS' => '左眼散光度数',
            'date' => 'Date',
            'advice' => '医生建议',
            'user_id' => '用户ID',
            'is_del' => 'Is Del',
        ];
    }
}
