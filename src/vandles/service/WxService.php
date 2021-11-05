<?php
/**
 *
 * Author: vandles
 * Date: 2021/9/10 15:16
 * Email: <vandles@qq.com>
 **/

namespace vandles\service;

use think\admin\Service;


class WxService extends Service {

    /**
     * 用于验证消息的确来自微信服务器
     * 
     * $token 与服务器配置中的token一致
     */
    public static function signature($token) {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        
        // $token = '与服务器配置中的token一致';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            echo $_GET['echostr'];
            return true;
        }else{
            return false;
        }
    }

}