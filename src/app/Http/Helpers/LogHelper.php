<?php

namespace App\Http\Helpers;


use App\Log;


class LogHelper
{
    public static function set_log($obj_request = null)
    {
        try {
            if ($obj_request->ok() === true) {

                $id = json_decode($obj_request->getBody()->getContents(), true)['_id'];
                Log::create(['car_id' => $id]);
            }
        } catch (Exception $e) {
            // Enviar a mensgem para um serviço externo ou injetar na resposta :/
        }

    }
}