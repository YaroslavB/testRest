<?php
declare(strict_types=1);

namespace App\Repository;


use App\Access\ObjectAccess;
use App\Database\Connection;
use App\Entity\User;
use PDO;
use ReflectionClass;
use ReflectionException;

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

    /**
     * Add new user to database
     * @param User $user
     * @throws ReflectionException
     */
    public function add(User $user): void
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

    /**
     * Find user by login
     * @param string $login
     * @return User|object|null
     * @throws ReflectionException
     */
    public function findLogin(string $login)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users where login =:login");
        $stmt->execute(['login' => $login]);
        if (!$row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return null;
        }
        /** @var User $user */
        $user = (new ReflectionClass(User::class))->newInstanceWithoutConstructor();
        $access = new ObjectAccess($user);
        $access->setPropertyValue('id', (int)$row['id']);
        $access->setPropertyValue('login', (string)$row['login']);
        $access->setPropertyValue('password', (string)$row['password']);
        $access->setPropertyValue('status', (int)$row['status']);

        return $user;
    }
}