<?php
declare(strict_types=1);

namespace App\Entity;

/**
 * Class User
 * @package App\Entity
 */
class User
{
    /**
     * @var  int/null
     */
    private $id;
    /**
     * @var string
     */
    private string $login;
    /**
     * @var string
     */
    private string $password;

    /**
     * User constructor.
     * @param $login
     * @param $password
     */
    public function __construct(string $login, string $password)
    {

        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function verifyPassword(string $password): bool
    {
        return $this->password === $password;
    }


}