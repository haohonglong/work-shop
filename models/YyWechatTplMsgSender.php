<?php
/**
 * User: Xany <762632258@qq.com>
 * Date: 2017/9/21
 * Time: 11:53
 */

namespace app\models;

use xanyext\wechat\Wechat;

/**
 * @property Store $store
 * @property Order $order
 * @property WechatTemplateMessage $wechat_template_message
 * @property User $user
 * @property FormId $form_id
 * @property Wechat $wechat
 */
class YyWechatTplMsgSender
{
    public $store_id;
    public $order_id;

    public $store;
    public $order;
    public $wechat_template_message;
    public $setting;
    public $user;
    public $form_id;
    public $wechat;

    /**
     * @param integer $store_id
     * @param integer $order_id
     * @param Wechat $wechat
     */
    public function __construct($store_id, $order_id, $wechat)
    {
        $this->store_id = $store_id;
        $this->order_id = $order_id;
        $this->wechat = $wechat;
        $this->store = Store::findOne($this->store_id);
        $this->order = YyOrder::findOne($this->order_id);
        $this->setting = YySetting::findOne(['store_id' => $this->store->id]);
        if (!$this->order)
            return;
        $this->user = User::findOne($this->order->user_id);
//        $this->form_id = FormId::find()->where(['order_no' => $this->order->order_no])->orderBy('id DESC')->one();
    }

    /**
     * 发送支付通知模板消息
     */
    public function payMsg()
    {
        try {
            if (!$this->setting->success_notice)
                return;
            $goods = YyGoods::find()
                ->select('name')
                ->andWhere(['id'=>$this->order->goods_id])
                ->one();
            $data = [
                'touser' => $this->user->wechat_open_id,
                'template_id' => $this->setting->success_notice,
                'form_id' => $this->order->form_id,
                'page' => 'pages/book/order/order?status=1',
                'data' => [
                    'keyword1' => [
                        'value' => $this->order->order_no,
                        'color' => '#333333',
                    ],
                    'keyword2' => [
                        'value' => date('Y-m-d H:i:s', $this->order->pay_time),
                        'color' => '#333333',
                    ],
                    'keyword3' => [
                        'value' => $this->order->pay_price,
                        'color' => '#333333',
                    ],
                    'keyword4' => [
                        'value' => $goods['name'],
                        'color' => '#333333',
                    ],
                ],
            ];
            $this->sendTplMsg($data);
        } catch (\Exception $e) {
            \Yii::warning($e->getMessage());
        }
    }

    /**
     * 发送退款模板消息
     * @param double $refund_price 退款金额
     * @param string $refund_reason 退款原因
     * @param string $remark 备注
     */
    public function refundMsg($refund_price, $refund_reason = '', $remark = '')
    {
        try {
            if (!$this->setting->refund_notice)
                return;
            $data = [
                'touser' => $this->user->wechat_open_id,
                'template_id' => $this->setting->refund_notice,
                'form_id' => $this->order->form_id,
                'page' => 'pages/order/order?status=4',
                'data' => [
                    'keyword1' => [
                        'value' => $refund_price,
                        'color' => '#333333',
                    ],
                    'keyword2' => [
                        'value' => $this->order->order_no,
                        'color' => '#333333',
                    ],
                    'keyword3' => [
                        'value' => $refund_reason,
                        'color' => '#333333',
                    ],
                    'keyword4' => [
                        'value' => $remark,
                        'color' => '#333333',
                    ],
                ],
            ];
            $this->sendTplMsg($data);
        } catch (\Exception $e) {
            \Yii::warning($e->getMessage());
        }
    }


    private function sendTplMsg($data)
    {
        $access_token = $this->wechat->getAccessToken();
        $api = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token={$access_token}";
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->wechat->curl->post($api, $data);
        $res = json_decode($this->wechat->curl->response, true);
        if (!empty($res['errcode']) && $res['errcode'] != 0) {
            \Yii::warning("模板消息发送失败：\r\ndata=>{$data}\r\nresponse=>" . json_encode($res, JSON_UNESCAPED_UNICODE));
        }
    }
}