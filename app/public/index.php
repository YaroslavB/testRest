<?php
declare(strict_types=1);


use App\Controller\AuthController;
use App\Service\Auth\AuthService;
use Engine\Container\Container;
use Engine\Router\Router;


require_once dirname(__DIR__) . '/vendor/autoload.php';


$url = $_SERVER['REQUEST_URI'];

$router = new Router();
$container = new Container();

$router->add('/signup', AuthController::class, 'signup');

// Add to container
$container->set(AuthService::class, function (Container $container) {
    return new AuthService();
});
$container->set(AuthController::class, function (Container $container) {
    return new AuthController($container->get(AuthService::class));
});


$match = $router->match($_SERVER['REQUEST_URI']);

$controller = $container->get($match['controller']);

$response = call_user_func([$controller, $match['action']]);
echo $response;










