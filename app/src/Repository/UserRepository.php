<?php
declare(strict_types=1);

namespace App\Repository;


use App\Database\Connection;
use App\Entity\User;
use http\Exception\RuntimeException;
use ReflectionException;
use ReflectionObject;

class UserRepository
{
    /**
     * @var Connection
     */
    private Connection $connection;


    /**
     * UserRepository constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function add(User $user)
    {
        $stmt = $this->connection->prepare(
            "INSERT INTO users
                             set login=:login,
                             password=:password,
                             status =:status"
        );
        $reflection = new ReflectionObject($user);
        try {
            $prop = $reflection->getProperty('password');
            $prop->setAccessible(true);
            $password = $prop->getValue();

        } catch (ReflectionException $e) {
            throw  new RuntimeException('Password empty');
        }
        $stmt->execute(
            [
                'login' => $user->getLogin(),
                'password',


            ]
        );
    }
}