<?php

namespace App\Http\Helpers;

use App\Http\Helpers\RequestHelper;
use App\Http\Helpers\ResponseHelper;


class RestHelper
{
    public static function make_response($obj_request = null)
    {
        $int_code = 500;
        $str_message = "An error occured";
        $arr_data = [];
        $debug = "";

        try {

            list('code' => $int_code,
            'message' => $str_message,
            'data' => $arr_data,
            'debug' => $debug) = RequestHelper::get_request($obj_request);

        } catch (Exception $e) {
            $debug = $e->getTraceAsString();
        }

        return ResponseHelper::make_response($int_code, $str_message, $arr_data, $debug);
    }

    public static function make_db_response($arr_data = [], $str_error = "")
    {
        
        $int_code = 500;
        $str_message = "An error occured";
        $arr_data = json_decode(json_encode($arr_data));
        $debug = $str_error;

        if (is_array($arr_data)) {
            $int_code = 200;
            $str_message = "";
        }

        return ResponseHelper::make_response($int_code, $str_message, $arr_data, $debug);
    }
}