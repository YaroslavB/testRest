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

        /* session_set_cookie_params([
             'lifetime' => 1800,
             'path' => '/',
             'secure' => true,
             'httponly' =>true
         ]);*/

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
     * @param  $value
     */
    public function set($key, $value): void
    {
        if (is_object($value)) {
            $_SESSION[$key] = serialize($value);

            return;
        }
        $_SESSION[$key] = $value;

    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key): bool
    {
        return isset($_SESSION[$key]);
    }
}