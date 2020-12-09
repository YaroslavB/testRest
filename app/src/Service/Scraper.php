<?php

    namespace App\Service;

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ConnectException;
    use http\Exception\RuntimeException;

class Scraper
{

    private $webClient;

    private $dom;

    /**
     * Scraper constructor.
     * @param $site
     * @param int $timeout
     */
    public function __construct($site, $timeout = 2)
    {
        $this->webClient = new Client([
            'base_uri' => $site,
            'timeout' => $timeout
        ]);
    }

    public function loadData($page)
    {
        try {
            $response = $this->webClient->get($page);
        } catch (ConnectException $e) {
            throw  new  RuntimeException($e->getHandlerContext()['error']);
        }
        $html = $response->getBody();
        $this->dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $this->dom->loadHTML($html);
        libxml_clear_errors();
        return $this;
    }

    /**
     * @param $xpath
     * @param null $parent
     * @return \DOMNodeList
     */
    private function getNodes($xpath, $parent = null): \DOMNodeList
    {
        $DomXpath = new \DOMXPath($this->dom);
        $nodes = $DomXpath->query($xpath, $parent);
        return $nodes;
    }

    /**
     * @param $xpath
     * @param null $parent
     * @return mixed
     */
    public function getNode($xpath, $parent = null)
    {
        $nodes = $this->getNodes($xpath, $parent);
        if ($nodes->length === 0) {
            throw new \RuntimeException("No matching node found");
        }

        return $nodes[0];
    }
}
