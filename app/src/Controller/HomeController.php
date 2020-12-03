<?php

    namespace  App\Controller;

    use Psr\Http\Message\ResponseInterface;
    use Psr\Http\Message\ServerRequestInterface;
    use Zend\Diactoros\Response\JsonResponse;

    /**
     * Class HomeController
     * @package App\Controller
     */
class HomeController
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $data = [
            'core' => 123,
            'more' => 456,
            'mor' => 4545,
            'fdfsdf' => 'fsdf'
        ];

        return new JsonResponse($data, 200);
    }
}
