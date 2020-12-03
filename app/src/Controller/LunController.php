<?php


    namespace App\Controller;



    use Psr\Http\Message\ServerRequestInterface;
    use Zend\Diactoros\Response\HtmlResponse;

    /**
     * Class LunController
     * @package App\Controller
     */
    class LunController
    {
        /**
         * @param ServerRequestInterface $request
         * @return HtmlResponse
         */
        public function __invoke(ServerRequestInterface $request): HtmlResponse
        {
            $data = [   'core' => 123,
                        'more' => 456,];

            return  new HtmlResponse( '<p>egsdfsdf</p>');
        }

    }