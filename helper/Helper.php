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
}