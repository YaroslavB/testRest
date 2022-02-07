<?php
declare(strict_types=1);

namespace App\Service\Auth;

use App\Entity\User;
use App\Repository\UserRepository;

class AuthService
{
    /**
     * @var UserRepository
     */
    private UserRepository $users;

    /**
     * AuthService constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
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
}