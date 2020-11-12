<?php

    namespace  App\Controller;

    use Psr\Http\Message\ResponseInterface;
    use Psr\Http\Message\ServerRequestInterface;

    use Zend\Diactoros\Response\JsonResponse;

    class HomeController
    {
        public  function  __invoke(ServerRequestInterface $request):ResponseInterface
        {
            $data = [
                'core'=>123,
                'more' => 456,
                'mor' => 4545,
                'fdfsdf'=>'fsdf'
            ];


           $response = new JsonResponse($data,200);

           return  $response;
        }

    }