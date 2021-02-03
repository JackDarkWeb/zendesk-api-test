<?php

namespace app\controllers;

use app\services\ApiService;
use app\services\TicketCsvService;

class Controller
{

    public static function home(){

        $endpoint = "api/v2/tickets.json";

        $data  = ApiService::get($endpoint);

        return TicketCsvService::create($data);
    }

}