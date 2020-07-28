<?php

namespace App\Http\Controllers;


use App\Log;
use App\Http\Helpers\RestHelper;


class LogController extends Controller
{
    public function get_logs()
    {
        $debug = null;
        try {
            $logs = Log::all();
        } catch (Exception $e) {
            $debug = $e->getTraceAsString();
        }
        
        return RestHelper::make_db_response($logs, $debug);
    }
}