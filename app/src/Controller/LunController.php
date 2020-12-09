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
        $data = [   'core' => 123,
                    'more' => 456,];

        $scraper = new Scraper('http://markusos.github.io/');
        $scraper->loadData('/');
        $siteTitle = $scraper->getNode('//a[@class="site-title"]');
        echo $siteTitle->nodeValue;



       // return  new HtmlResponse( '<p>egsdfsdf</p>');
    }
}
