<?php

namespace app\services;

use GuzzleHttp\Client;

class ApiService
{
    protected static $base_url = "https://test246.zendesk.com/";
    protected static $username = "jacknouatin1@gmail.com";
    protected static $password = "developper90";

    public static function get(string $endpoint){

        $client = new Client();

        $response = $client->request('GET', self::$base_url.''.$endpoint, [
            'auth' => [self::$username, self::$password]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}