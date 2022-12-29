<?php

use App\RobiMvc\Core\Application;

require __DIR__.'./vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'db_user' => $_SERVER['DB_USER'],
        'db_pass' => $_SERVER['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);
$app->db->applyMigrations();

function dd($var)
{
    if(is_array($var)){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        exit;
    }else{
        echo '<pre>';
        echo($var);
        echo '</pre>';
        exit;
    }
}

function vd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}
function vd_cont($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}