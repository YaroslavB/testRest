<?php
    declare(strict_types=1);
    require_once __DIR__ . '/../bootstrap.php';

    $request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
    $router = new League\Route\Router;

// map a route
    $router->map('GET', '/', App\Controller\HomeController::class);
    $router->map('GET', '/api', App\Controller\HomeController::class);
   /// $router->map('GET', '/api/retrieve', App\Controller\RetrieveController::class);
    $router->map('GET', '/api/retrieve/{id:\d+}', App\Controller\RetrieveController::class);
    $response = $router->dispatch($request);
    (new Zend\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);



 //   $key = base64_encode(openssl_random_pseudo_bytes(64));
    $secret = 'fXERPLjrr3arNo2DDhJrIxL1JUq/Ha2r6n6WgXSzZTdX+uCWKY7zjNq4X+/4kJtj0mAtQwK7LQ8dcraOxNLCCg==';



