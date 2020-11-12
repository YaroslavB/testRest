<?php


    namespace App\Controller;


    use Psr\Http\Message\ResponseInterface;
    use Psr\Http\Message\ServerRequestInterface;
    use Zend\Diactoros\Response\JsonResponse;

    class RetrieveController
    {

        public  function  __invoke(ServerRequestInterface $request):ResponseInterface
        {
            $req = $request->getQueryParams();


            $response = !empty($req) ? new JsonResponse($req, 200) : new JsonResponse('Not Fond', 404);

            return  $response;
        }

    }