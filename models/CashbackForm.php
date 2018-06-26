<?php

namespace app\models;

use Yii;


class CashbackForm extends Model
{
    public $pic_list,
            $userid,
            $remark,
            $pic_optometry;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'pic_list','pic_optometry'], 'required'],
            [['userid'], 'integer'],
            [['pic_list','pic_optometry', 'remark'], 'string'],
        ];
    }

    public function apply()
    {
        $this->pic_list = json_encode([
            'pic_list'=>$this->pic_list,
            'optometry'=>$this->pic_optometry,
        ]);
        if($this->validate()){
            $model = new Cashback();
            $model->userid = $this->userid;
            $model->pics = $this->pic_list;
            $model->create_at = date('Y-m-d H:i:s');
            $model->modify_at = $model->create_at;
            $model->status = 1;
            $model->remark = $this->remark;
            if($model->save()){
                return true;
            }
        }
        return false;

    }

    static public function check($id,$status)
    {
        $model = Cashback::find()->where(['id'=>$id])->limit(1)->one();
        if($model){
            switch ($status){
                case 2:
                case 3:
                case 4:
                    $model->status = $status;
                    $model->modify_at = date('Y-m-d H:i:s');
                    $model->save();
                    return true;
                    break;
                default:


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
            'userid' => 'Userid',
            'status' => 'Status',
            'pics' => 'Pics',
            'remark' => 'Remark',
            'create_at' => 'Create At',
            'modify_at' => 'Modify At',
        ];
    }
}
