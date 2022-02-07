<?php
declare(strict_types=1);

namespace App\Service\Auth;

use App\Entity\User;

class AuthService
{

    /**
     * @param SignupDto $dto
     * @return User
     */
    public function signup(SignupDto $dto):User
  {
      return new User($dto->login,$dto->password);
  }
}