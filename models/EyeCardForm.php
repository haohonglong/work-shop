<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EyeCardForm extends Model
{

    public $id;
    public $title;
    public $day;
    public $date;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'day'], 'required'],
            [['day'], 'integer'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    public function save()
    {
        if($this->validate()){
            $model = new EyeCard();
            $model->title = $this->title;
            $model->day = $this->day;
            if($model->save()){
                return true;
            }
            $this->addError($model->getErrors());
        }
        return false;
    }

    public function edit()
    {
        if($this->validate()){
            $model = EyeCard::getById($this->id);
            if($model){
                $model->title = $this->title;
                $model->day = $this->day;
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
            'title' => '名称',
            'day' => '天数',
        ];
    }
}
