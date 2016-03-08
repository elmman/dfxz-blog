<?php

namespace App\Libraries\Constants;

class Err
{
    const REQUEST_ERROR                 =       100001;
    const REQUEST_PARAMS_ERROR          =       100002;

    const SERVER_ERROR                  =       500000;

    private static $messages = [
        '100001'        =>      '请求错误',
        '100002'        =>      '请求参数错误',

        '500000'        =>      '服务器内部错误',
    ];

    /**
     * 返回错误码对应的信息
     *
     * @param $error_code
     * @return string
     */
    public static function getMessage($error_code) {

        $error_code = (string)$error_code;
        return isset(self::$messages[$error_code]) ? self::$messages[$error_code] : '';
    }
}