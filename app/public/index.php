<?php
declare(strict_types=1);


use App\Controller\AuthController;
use App\Database\Connection;
use App\Repository\UserRepository;
use App\Service\Auth\AuthService;
use App\Storage\SessionStorage;
use Engine\Container\Container;
use Engine\Router\Router;


require_once dirname(__DIR__).'/vendor/autoload.php';


$url = $_SERVER['REQUEST_URI'];

$router = new Router();
$container = new Container();

$router->add('/signup', AuthController::class, 'signup');
$router->add('/login', AuthController::class, 'login');

// Add to container

$container->set(
    SessionStorage::class,
    function () {
        return new SessionStorage();
    }
);

$container->set(
    Connection::class,
    function (Container $container) {
        return new Connection("mysql:host=db;dbname=todo", "root", "root",);
    }
);

/** @var Connection $connection */
$connection = $container->get(Connection::class);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$container->set(
    UserRepository::class,
    function (Container $container) {
        return new UserRepository($container->get(Connection::class));
    }
);

$container->set(
    AuthService::class,
    function (Container $container) {
        return new AuthService(
            $container->get(UserRepository::class),
            $container->get(SessionStorage::class)
        );
    }
);
$container->set(
    AuthController::class,
    function (Container $container) {
        return new AuthController($container->get(AuthService::class));
    }
);


$match = $router->match($_SERVER['REQUEST_URI']);

$controller = $container->get($match['controller']);

$response = $controller->{$match['action']}();
echo $response;










