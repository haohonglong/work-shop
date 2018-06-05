<?php
/**
 * Created by PhpStorm.
 * User: yanglin
 * Date: 2018/6/5
 * Time: 11:25
 */

namespace app\helper;


class Date
{
    /**
     * 日期范围字符串转换数组
     * @param $finished
     * @return array|null
     */
    public static function daterangeToArray($finished){
        if(!empty(trim($finished))){
            $finished = explode(' - ',$finished);
            $finished[0] = trim($finished[0]).' 00:00:00';
            $finished[1] = trim($finished[1]).' 23:59:59';
        }else{
            $finished = null;
        }
        return $finished;
    }
}