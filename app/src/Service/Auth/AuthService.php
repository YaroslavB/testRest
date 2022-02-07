<?php
declare(strict_types=1);

namespace App\Service\Auth;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Storage\SessionStorage;
use DomainException;

class AuthService
{
    /**
     * @var UserRepository
     */
    private UserRepository $users;
    /**
     * @var SessionStorage
     */
    private SessionStorage $sessionStorage;

    /**
     * AuthService constructor.
     * @param UserRepository $users
     * @param SessionStorage $sessionStorage
     */
    public function __construct(UserRepository $users, SessionStorage $sessionStorage)
    {
        $this->users = $users;
        $this->sessionStorage = $sessionStorage;
    }


    /**
     * @param SignupDto $dto
     * @return User
     */
    public function signup(SignupDto $dto): User
    {
        $user = new User($dto->login, $dto->password);
        $this->users->add($user);

        return $user;
    }

    public function login(LoginDto $loginDto): User
    {
        if (!$user = $this->users->findLogin($loginDto->login)) {
            throw new DomainException('User not found');
        }
        if (!$user->verifyPassword($loginDto->password)) {
            throw  new DomainException('Wrong Password (');
        }

        $this->sessionStorage->set("user", $user);

        return $user;

    }
}