<?php

namespace service;

use think\admin\Service;


class Tools extends Service {

    public static function parseUploadFileName($bg) {
        $path = explode('upload', $bg);
        $shortName = "/upload" . $path[1];
        return [
            'shortName' => $shortName,
            'fullName'  => app()->getRootPath() . 'public' . $shortName,
            'url'       => $bg,
        ];
    }
}