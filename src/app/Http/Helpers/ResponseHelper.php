<?php

namespace App\Http\Helpers;


class ResponseHelper
{
    public static function make_response($code = 0, $message = "", $data = [], $debug_msg = null)
    {
        $arr_pattern = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];

        if (env('APP_DEBUG') === true) {
            $arr_pattern['debug'] = $debug_msg;
        }

        return $arr_pattern;
    }
}