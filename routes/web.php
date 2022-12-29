<?php

use Robi\App\controllers\SiteController;

// $app->router->get('/', function(){
//     return 'Hello World!';
// });
// $app->router->post('/contact', function(){
//     return 'handling data';
// });

$app->router->get('/', '/home');
$app->router->get('/about', 'about');
$app->router->get('/contact', 'contact');
$app->router->post('/contact', [SiteController::class, 'contact']);
// $app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/login', '/auth/login');