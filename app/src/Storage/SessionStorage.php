<?php
declare(strict_types=1);

namespace App\Storage;


class SessionStorage
{

    /**
     * SessionStorage constructor.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $_SESSION[$key];
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        if (is_object($value)) {
            $_SESSION[$key] = serialize($value);
        }
        $_SESSION[$key] = $value;

    }
}