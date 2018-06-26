<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%eye_optometry_list}}".
 *
 * @property string $id
 * @property string $VD 镜眼距,单位mm
 * @property string $DSL 左球面镜
 * @property string $DSR 右球面镜
 * @property string $DCL 左圆柱镜
 * @property string $DCR 右圆柱镜
 * @property string $PDL 左瞳距,单位mm
 * @property string $PDR 右瞳距,单位mm
 * @property string $VAL 左裸眼视力
 * @property string $VAR 右裸眼视力
 * @property string $CVAL 左矫正视力
 * @property string $CVAR 右矫正视力
 * @property string $AL 左眼轴向
 * @property string $AR 右眼轴向
 * @property string $DL 左眼镜的度数
 * @property string $DR 右眼镜的度数
 * @property string $create_at
 * @property string $modify_at
 * @property string $remak 备注
 * @property int $user_id
 * @property int $is_delete 1:删除
 */
class EyeOptometryListForm extends Model
{
    public   $user_id
            ,$VD
            ,$DSL
            ,$DSR
            ,$DCL
            ,$DCR
            ,$PDL
            ,$PDR
            ,$VAL
            ,$VAR
            ,$CVAL
            ,$CVAR
            ,$AL
            ,$AR
            ,$DL
            ,$DR
            ,$remak;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['DL', 'DR', 'user_id'], 'integer'],
            [['create_at', 'modify_at'], 'safe'],
            [['user_id'], 'required'],
            [['VD', 'DSL', 'DSR', 'DCL', 'DCR', 'PDL', 'PDR', 'VAL', 'VAR', 'CVAL', 'CVAR', 'AL'], 'string', 'max' => 25],
            [['AR'], 'string', 'max' => 5],
            [['remak'], 'string', 'max' => 255],
        ];
    }

    public static function getById($id)
    {
        return EyeOptometryList::find()->where(['id'=>$id])->limit(1)->one();
    }

    public static function del($id)
    {
        $model = self::getById($id);
        if($model){
            $model->is_delete = 1;
            if($model->save()){
                return true;
            }
        }
        return false;
    }

    public function save($id=null)
    {
        if(true){
            $model = self::getById($id);
            $is_edit = $model;
            if(!$model){
                $model = new EyeOptometryList();
            }
            $model->user_id = $this->user_id;
            $model->VD = $this->VD;
            $model->DSL = $this->DSL;
            $model->DSR = $this->DSR;
            $model->DCL = $this->DCL;
            $model->DCR = $this->DCR;
            $model->PDL = $this->PDL;
            $model->PDR = $this->PDR;
            $model->VAL = $this->VAL;
            $model->VAR = $this->VAR;
            $model->CVAL = $this->CVAL;
            $model->CVAR = $this->CVAR;
            $model->AL = $this->AL;
            $model->AR = $this->AR;
            $model->DL = $this->DL;
            $model->DR = $this->DR;
            $model->remak = $this->remak;
            $date = date('Y-m-d H:i:s');
            if(!$is_edit){
                $model->create_at = $date;
            }
            $model->modify_at = $date;
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
            'user_id' => '用户名称',
            'VD' => '镜眼距单位mm',
            'DSL' => '左球面镜',
            'DSR' => '右球面镜',
            'DCL' => '左圆柱镜',
            'DCR' => '右圆柱镜',
            'PDL' => '左瞳距单位mm',
            'PDR' => '右瞳距,单位mm',
            'VAL' => '左裸眼视力',
            'VAR' => '右裸眼视力',
            'CVAL' => '左矫正视力',
            'CVAR' => '右矫正视力',
            'AL' => '左眼轴向',
            'AR' => '右眼轴向',
            'DL' => '左眼镜的度数',
            'DR' => '右眼镜的度数',
            'remak' => '备注',
        ];
    }
}
