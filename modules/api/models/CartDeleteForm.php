<?php
/**
 * User: Xany <762632258@qq.com>
 * Date: 2017/7/28
 * Time: 16:24
 */

namespace app\modules\api\models;


use app\models\Cart;

class CartDeleteForm extends Model
{
    public $store_id;
    public $user_id;
    public $cart_id_list;

    public function rules()
    {
        return [
            [['cart_id_list'], 'required'],
        ];
    }

    public function save()
    {
        if (!$this->validate())
            return $this->getModelError();
        $this->cart_id_list = json_decode($this->cart_id_list, true);
        foreach ($this->cart_id_list as $cart_id) {
            $cart = Cart::findOne([
                'store_id' => $this->store_id,
                'is_delete' => 0,
                'user_id' => $this->user_id,
                'id' => $cart_id,
            ]);
            if (!$cart)
                continue;
            $cart->is_delete = 1;
            $cart->save();
        }
        return [
            'code' => 0,
            'msg' => '删除完成',
        ];
    }
}