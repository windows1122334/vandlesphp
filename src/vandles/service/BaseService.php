<?php
/**
 *
 * Author: vandles
 * Date: 2021/9/29 20:09
 * Email: <vandles@qq.com>
 **/

namespace vandles\service;

use stdClass;
use think\admin\Service;
use think\exception\HttpResponseException;

class BaseService extends Service{

    /**
     * 返回失败的操作
     * @param mixed $info 消息内容
     * @param mixed $data 返回数据
     * @param mixed $code 返回代码
     */
    public static function error($info, $data = '{-null-}', $code = 0): void{
        if ($data === '{-null-}') $data = new stdClass();
        throw new HttpResponseException(json([
            'code' => $code, 'info' => $info, 'data' => $data,
        ]));
    }

    /**
     * 返回成功的操作
     * @param mixed $info 消息内容
     * @param mixed $data 返回数据
     * @param mixed $code 返回代码
     */
    public static function success($info, $data = '{-null-}', $code = 1): void{
        if ($data === '{-null-}') $data = new stdClass();
        throw new HttpResponseException(json([
            'code' => $code, 'info' => $info, 'data' => $data,
        ]));
    }

}