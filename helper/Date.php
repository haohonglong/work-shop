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
     * @param string $delimiter
     * @return array|null
     */
    public static function daterangeToArray($finished,$delimiter=' - '){
        if(!empty(trim($finished))){
            $finished = explode($delimiter,$finished);
            $finished[0] = trim($finished[0]).' 00:00:00';
            $finished[1] = trim($finished[1]).' 23:59:59';
        }else{
            $finished = null;
        }
        return $finished;
    }

    /**
     * 获取几年内的时间段
     * @param {integer}$n        年
     * @return array
     */
    public static function getYear($n)
    {
        $n = $n-1;
        $time = strtotime("-{$n} year", time());
        $begin = date('Y-m-d 00:00:00', mktime(0, 0, 0, 1, 1, date('Y', $time)));
        //current time
        $end = date('Y-m-d 23:39:59', mktime(0, 0, 0, 12, 31, date('Y')));
        return [$begin,$end];
    }

    /**
     * 获取几月内的时间段
     * @param {integer}$n     月
     * @return array
     */
    public static function getMonth($n)
    {
        $n = $n-1;
        $now = time();
        $time = strtotime("-{$n} month", $now);
        $begin = date('Y-m-d 00:00:00', mktime(0, 0,0, date('m', $time), 1, date('Y', $time)));
        $end = date('Y-m-d 23:39:59', mktime(0, 0, 0, date('m', $now), date('t', $now), date('Y', $now)));
        return [$begin,$end];
    }
}