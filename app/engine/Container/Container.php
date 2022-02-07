<?php
declare(strict_types=1);

namespace Engine\Container;




use LogicException;

class Container
{
    private $definitions = [];

    public function set($key, $definition)
    {
        $this->definitions[$key] = $definition;
    }

    public function get($key)
    {
        if(!isset($this->definitions[$key])){
            throw new LogicException('Service is not exist -- ' . $key);
        }
        return $this->definitions[$key];
    }
}