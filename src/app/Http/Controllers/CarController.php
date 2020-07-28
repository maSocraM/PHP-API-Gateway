<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Helpers\RestHelper;
use App\Http\Helpers\LogHelper;


class CarController extends Controller
{

    public function __construct()
    {
        $this->api_url = sprintf("%s%s%s", env("API_URL"), env("API_PATH"), "/cars");
    }

    public function listCars()
    {
        $request = Http::get($this->api_url);
        return RestHelper::make_response($request);
    }

    public function createCar(Request $request)
    {
        $request = Http::post($this->api_url, $arr_body = $request->all());

        LogHelper::set_log($request);

        return RestHelper::make_response($request);
    }
}