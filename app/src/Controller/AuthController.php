<?php
declare(strict_types=1);

namespace App\Controller;


use App\Service\Auth\AuthService;
use App\Service\Auth\SignupDto;
use JsonException;

class AuthController
{
    private AuthService $authService;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @return string
     * @throws JsonException
     */
    public function signup(): string
    {
        $query = json_decode(file_get_contents("php://input"),
            true,
            512,
            JSON_THROW_ON_ERROR);

        $dto = new SignupDto();
        $dto->login = $query['login'];
        $dto->password = $query['password'];

        $user = $this->authService->signup($dto);
        return json_encode([
            'id' => $user->getId(),
            'login' => $user->getLogin()
        ], JSON_THROW_ON_ERROR);

    }
}