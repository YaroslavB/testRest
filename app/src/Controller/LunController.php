<?php

    namespace App\Controller;

    use App\Service\Scraper;
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
         * @param Scraper $scraper
         * @return HtmlResponse
         */
        public function __invoke(ServerRequestInterface $request): HtmlResponse
        {


            $scraper = new Scraper('http://markusos.github.io/');
            $scraper->loadData('/');
            $siteTitle = $scraper->getNode('//a[@class="site-title"]');

            return $siteTitle->nodeValue;


            // return  new HtmlResponse( '<p>egsdfsdf</p>');
        }
    }
