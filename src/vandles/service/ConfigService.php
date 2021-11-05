<?php
/**
 *
 * Author: vandles
 * Date: 2021/9/10 15:16
 * Email: <vandles@qq.com>
 **/

namespace vandles\service;

use think\admin\Service;

class ConfigService extends Service {

    // 用户token的过期时间（秒）
    public static function getTokenExpired() {
        return config('z.token_expired');
    }

}