<?php
declare(strict_types=1);

namespace Engine\Router;


class Router
{
    private $routes = [];

    /**
     * @param string $url
     * @param string $controller
     * @param string $method
     */
    public function add(string $url, string $controller, string $method): void
    {
        $this->routes[] = [
            'route'=>$url,
            'controller' => $controller,
            'action'=>$method
        ];
    }


    /**
     * @param string $url
     * @return array
     */
    public function match(string $url):array
    {
           foreach ($this->routes as $route)
           {
               if($route['route'] == $url) {
                   return  $route;
               }
           }
           throw  new \LogicException('Route not Found- '.$url);
    }
}