<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EyeRecordForm extends Model
{
    public $id;
    public $type;
    public $day;
    public $method;
    public $feel;
    public $tip;
    public $date;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip'], 'string'],
            [['type'], 'string', 'max' => 50],
            [['day'], 'string', 'max' => 20],
            [['method'], 'string', 'max' => 255],
            [['feel'], 'string', 'max' => 30],
        ];
    }

    public function edit()
    {
        if($this->validate()){
            $model = EyeRecord::getById($this->id);
            if($model){
                $model->type = $this->type;
                $model->day = $this->day;
                $model->method = $this->method;
                $model->feel = $this->feel;
                $model->tip = $this->tip;
                $model->date = date('Y-m-d H:i:s');
                if($model->save()){
                    return true;
                }
                $this->addError($model->getErrors());
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
        ];
    }
}
