<?php

namespace app\models;

use Yii;


class EyeInfoForm extends Model
{

    public $user_id;
    public $num_R;
    public $num_L;
    public $num_LS;
    public $num_RS;
    public $degrees;
    public $advice;
    public $date;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['degrees', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['advice'], 'string'],
            [['user_id','num_R', 'num_L', 'num_RS', 'num_LS','degrees'], 'required'],
            [['num_R', 'num_L', 'num_RS', 'num_LS'], 'string', 'max' => 6],
        ];
    }

    public function save()
    {
        if($this->validate()){
            $model = new EyeInfo();
            $model->user_id = $this->user_id;
            $model->num_R = $this->num_R;
            $model->num_L = $this->num_L;
            $model->num_RS = $this->num_RS;
            $model->num_LS = $this->num_LS;
            $model->degrees = $this->degrees;
            $model->advice = $this->advice;
            $model->date = date('Y-m-d H:i:s');
            if($model->save()){
                return true;
            }
            $this->addError($model->getErrors());

        }else{

        }
        return false;
    }

    public function edit($id)
    {
        if($this->validate()){
            $model = EyeInfo::getById($id);
            $model->user_id = $this->user_id;
            $model->num_R = $this->num_R;
            $model->num_L = $this->num_L;
            $model->num_RS = $this->num_RS;
            $model->num_LS = $this->num_LS;
            $model->degrees = $this->degrees;
            $model->advice = $this->advice;
            $model->date = date('Y-m-d H:i:s');
            if($model->save()){
                return true;
            }
            $this->addError($model->getErrors());

        }else{

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
            'degrees' => '眼镜度数',
            'date' => 'Date',
            'advice' => '医生建议',
            'user_id' => '用户ID',
            'is_del' => 'Is Del',
        ];
    }


}
