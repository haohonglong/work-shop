<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/6/8
 * Time: 16:06
 */

namespace app\helper;


class Helper
{
    /**
     * @author lhh
     * 创建日期：2018-06-08
     * 修改日期：2018-06-08
     * 名称：getrandomstring
     * 功能：随机生成字符串
     * 说明：
     * 注意：
     * @param int $len
     * @param null $chars
     * @return string
     */
    public static function getrandomstring($len=24,$chars=null){
        if(is_null($chars)){
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        }
        mt_srand(1000*(double)time());
        $str = '';
        for($i = 0,$lc = strlen($chars)-1;$i<$len;$i++){
            $str.= $chars[mt_rand(0,$lc)];
        }
        return $str;
    }

    /**
     * @author lhh
     * 创建日期：2018-06-08
     * 修改日期：2018-06-08
     * 名称：encrypt
     * 功能：加密测试
     * 说明：
     * 注意：
     * @param $id
     * @param $data
     * @return string
     */
    public static function encrypt($id,&$data){
        $id=serialize($id);
        $key="1112121212121212121212";
        $data['iv']=base64_encode(substr('fdakinel;injajdji',0,16));
        $data['value']=openssl_encrypt($id, 'AES-256-CBC',$key,0,base64_decode($data['iv']));
        $encrypt=base64_encode(json_encode($data));
        return $encrypt;
    }
}