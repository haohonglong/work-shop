<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 26/05/2018
 * Time: 3:24 AM
 */

namespace app\helper;


class Response
{
    public static function json($code,$message,$data=null){
        return \Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => [
                "code" => $code,
                "message" => $message,
                "data" => $data
            ],
        ]);
    }
    public static function xml($code,$message,$data=null){
        return \Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_XML,
            'data' => [
                "code" => $code,
                "message" => $message,
                "data" => $data
            ],
        ]);
    }

}