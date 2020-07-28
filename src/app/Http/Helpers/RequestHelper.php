<?php

namespace App\Http\Helpers;


class RequestHelper
{
    public static function get_request($obj_request = null)
    {
        $arr_ret['code'] = 200;
        $arr_ret['message'] = "";
        $arr_ret['data'] = json_decode($obj_request->getBody()->getContents(), true);
        $arr_ret['debug'] = "";

        if ($obj_request->ok() !== true) {
            $arr_ret['code'] = 500;
            $arr_ret['message'] = "An error occured";
            $arr_ret['data'] = "";
            $arr_ret['debug'] = ['http_code' => $obj_request->getStatusCode(), 'stack' => $obj_request->getBody()];
        }

        return $arr_ret;
    }

}