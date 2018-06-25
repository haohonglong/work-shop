<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cashback}}".
 *
 * @property int $id
 * @property int $userid 哪个人申请返现
 * @property int $status 1:审核通过，2：审核中，3：审核失败,4:已经返现
 * @property string $pic_list 所有场景图片,json 格式
 * @property string $pic_optometry_list 验光单图片
 * @property string $remark 备注
 * @property string $create_at
 * @property string $modify_at
 */
class CashbackForm extends Model
{
    public $pic_list,
            $userid,
            $remark,
            $pic_optometry_list;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'pic_list', 'pic_optometry_list'], 'required'],
            [['userid'], 'integer'],
            [['pic_list', 'pic_optometry_list', 'remark'], 'string'],
        ];
    }

    public function apply()
    {
        $this->pic_list = json_encode($this->pic_list);
        if($this->validate()){
            $model = new Cashback();
            $model->userid = $this->userid;
            $model->pic_list = $this->pic_list;
            $model->pic_optometry_list = $this->pic_optometry_list;
            $model->create_at = date('Y-m-d H:i:s');
            $model->modify_at = $model->create_at;
            $model->status = 1;
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
            'userid' => '用户ID',
            'status' => '返现状态',
            'pic_list' => 'Pic List',
            'pic_optometry_list' => 'Pic Optometry List',
            'remark' => '备注',
            'create_at' => '申请日期',
            'modify_at' => '审核日期',
        ];
    }
}
