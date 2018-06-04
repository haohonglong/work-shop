<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "person_card".
 *
 * @property int $id
 * @property string $title
 * @property string $tip
 */
class PersonCardForm extends Model
{
    public $id;
    public $f_id;
    public $title;
    public $tip;
    public $type;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'tip', 'f_id'], 'required'],
            [['f_id', 'type'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['tip'], 'string', 'max' => 128],
        ];
    }

    public function save()
    {
        if($this->validate()){
            $model = new PersonCard();
            $model->f_id = $this->f_id;
            $model->title = $this->title;
            $model->tip = $this->tip;
            $model->type = $this->type;
            if($model->save()){
                return true;
            }
            $this->addError($model->getErrors());
        }
        return false;
    }

    public function edit()
    {
        $model = PersonCard::getById($this->id);
        if($model){
            $model->title = $this->title;
            $model->tip = $this->tip;
            if($model->save()){
                return true;
            }
            $this->addError($model->getErrors());
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => '名称',
            'tip' => '小提示',
            'f_id' => '家庭',
            'type' => '卡的类型',
        ];
    }
}
