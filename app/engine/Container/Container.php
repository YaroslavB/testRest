<?php
declare(strict_types=1);

namespace Engine\Container;

use LogicException;

class Container
{
    private array $definitions = [];

    public function set($key, $definition): void
    {
        $this->definitions[$key] = $definition;
    }

    public function get($key)
    {
        if (!isset($this->definitions[$key])) {
            throw new LogicException('Service is not exist -- ' . $key);
        }

        if (is_callable($this->definitions[$key])) {
            $this->definitions[$key] = call_user_func($this->definitions[$key], $this);
        }

        return $this->definitions[$key];
    }
}