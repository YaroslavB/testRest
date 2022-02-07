<?php
declare(strict_types=1);

if (!ini_set('display_errors', '1'))
    throw new RuntimeException('Unable to set display_errors.');

error_reporting(E_ALL);

use App\Controller\AuthController;
use App\Service\Auth\AuthService;
use Engine\Container\Container;
use Engine\Router\Router;


require_once dirname(__DIR__) . '/vendor/autoload.php';


$url = $_SERVER['REQUEST_URI'];

$router = new Router();
$container = new Container();

$router->add('/signup', AuthController::class, 'singup');
$container->set(AuthController::class, new AuthController(new AuthService()));
$match = $router->match($_SERVER['REQUEST_URI']);

$controller = new $match['controller']();
$response = $controller->{$match['_action']}();









