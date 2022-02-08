<?php
declare(strict_types=1);

namespace App\Repository;


use App\Access\ObjectAccess;
use App\Database\Connection;
use App\Entity\User;

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
        $reflection = new ObjectAccess($user);
        $stmt->execute(
            [
                'login' => $reflection->getPropertyValue('login'),
                'password' => $reflection->getPropertyValue('password'),
                'status' => $reflection->getPropertyValue('status'),
            ]
        );

        $reflection->setPropertyValue('id', (int)$this->connection->lastInsertId());
    }

    public function findLogin(string $login): User
    {

    }
}