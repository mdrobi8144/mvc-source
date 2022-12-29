<?php
use App\RobiMvc\Core\Application;
use Robi\App\controllers\AuthController;
use Robi\App\controllers\SiteController;
use App\RobiMvc\Core\Route;

require __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => \Robi\App\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'db_user' => $_SERVER['DB_USER'],
        'db_pass' => $_SERVER['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

// require dirname(__DIR__).'/routes/web.php';

Route::get('/', [SiteController::class, 'index']);
$app->router->get('/about', [SiteController::class, 'getAboutPg']);
$app->router->get('/user/profile', [AuthController::class, 'profile']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);

$app->run();

function dd($var, $print_type = null)
{
    if(is_array($var) && count(array_filter($var,'is_array')) > 1){
        foreach($var as $var){
            printThis($var, $print_type);
        }
    }else if(is_array($var)){
        printThis($var, $print_type);
    }else{
        echo '<pre style="margin: 10px 0 0 40px;">'. $var .'</pre>';
    }
}

function od($var)
{
    if(get_class($var)){
        printThis($var, 'd');
    }
}

function printThis($var, $cond = null)
{
    echo '<pre style="margin: 40px 0 0 40px;">';
    if($cond === 'd'){
        var_dump($var);
    }else{
        print_r($var);
    }
    echo '</pre>';
}