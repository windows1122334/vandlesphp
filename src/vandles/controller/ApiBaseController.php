<?php
/**
 *
 * Author: vandles
 * Date: 2021/9/10 16:02
 * Email: <vandles@qq.com>
 **/

namespace vandles\controller;

use vandles\service\UserInfoService;
use think\App;
use think\facade\Log;

class ApiBaseController extends BaseController {

    protected $whiteList = ['login'];
    protected $userInfo = null;
    protected $uid = 0;
    protected $openid = '';

    public function initialize() {
        parent::initialize();
        $action = $this->request->action();
        if(!in_array($action, $this->whiteList)){
            $this->checkToken();
        }
    }

    public function checkToken(){
        $token = $this->header('token');
        if(!$token) $this->error('token参数错误', [],-1);
        $userInfo = UserInfoService::getUserInfoByToken($token);
        if(!$userInfo) $this->error('token已过期', [],-1);
        $this->userInfo = $userInfo;
        $this->uid = $userInfo['id'];
        $this->openid = $userInfo['openid'];
    }

}