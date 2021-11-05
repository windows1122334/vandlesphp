<?php
/**
 *
 * Author: vandles
 * Date: 2021/9/10 15:16
 * Email: <vandles@qq.com>
 **/


namespace service;


use vandles\model\UserInfoModel;
use vandles\model\UserVipModel;
use think\facade\Db;
use think\helper\Str;

class UserInfoService extends BaseService {
    static $limit = 10;

    public static function getUserInfoByOpenid($openid){
        $userInfo = UserInfoModel::where('openid', $openid)->hidden(['deleted','sort','remark'])->find();
        return $userInfo;
    }

    public static function create($userInfo) {
        UserInfoModel::create($userInfo);
        return self::getUserInfoByOpenid($userInfo['openid']);
    }

    public static function setToken($userInfo) {
        $token = Str::random(64);
        cache($token, $userInfo, ConfigService::getTokenExpired());
        $expired = time() + ConfigService::getTokenExpired() - 300;
        return compact('token','expired', 'userInfo');
    }

    public static function getUserInfoByUid($uid, $field='*') {
        return self::bindVip($uid, $field);
    }

    public static function updateUserInfoByUid($uid, $userInfo) {
        UserInfoModel::update($userInfo, ['id'=>$uid]);
        return UserInfoService::getUserInfoByUid($uid);
    }

    public static function updatePhoneByUid($uid, $phoneNumber) {
        UserInfoModel::update(['phone'=>$phoneNumber], ['id'=>$uid]);
        return UserInfoService::getUserInfoByUid($uid);
    }

    public static function getUserInfoByToken($token) {
        return cache($token);
    }
}