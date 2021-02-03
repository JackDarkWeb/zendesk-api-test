<?php

require __DIR__ . '/../vendor/autoload.php';


use app\controllers\Controller;
use app\core\Application;

$app = new Application();


$route = $app->router;


$route->get('/', [Controller::class, 'home']);


$app->run();