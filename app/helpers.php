<?php

use App\Libraries\Constants\Err;
use Illuminate\Http\Request;

if (!function_exists('xabort')) {
    /**
     * 终止程序
     *
     * @param int $httpCode
     * @param int $errorCode
     * @param null $messages
     * @param boolean $isAppend
     * @param array $headers
     * @throws \App\Exceptions\AbortException
     */
    function xabort($httpCode = 0, $errorCode = 0, $messages = null, $isAppend = false, $headers = []) {
        if (is_null($messages)) {
            $errorMessage = Err::getMessage($errorCode);
        }else {
            if ($isAppend) {
                $errorMessage = Err::getMessage($errorCode) . $messages;
            }else {
                $errorMessage = $messages;
            }
        }

        throw new \App\Exceptions\AbortException($httpCode, $errorMessage, null, $headers, $errorCode);
    }
}

if (!function_exists('renderHeaders')) {

    /**
     * 渲染 http headers
     *
     * @param Request $request
     * @return array
     */
    function renderHeaders(Request $request) {
        $origin = $request->header('origin');
        $white_domain = config('domain');
        $allow_headers = 'Origin, X-Requested-With, Content-Type, Accept, X-HTTP-Method-Override, Cookie, AccessToken';

        if ($origin) {
            $compo = parse_url($origin);
            if (in_array($compo['host'], $white_domain)) {
                $header = [
                    'Access-Control-Allow-Origin' => $origin,
                    'Access-Control-Allow-Credentials' => 'true',
                    'Access-Control-Allow-Headers' => $allow_headers,
                    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, DELETE, PUT'
                ];
                return $header;
            }
        }

        return [];
    }
}