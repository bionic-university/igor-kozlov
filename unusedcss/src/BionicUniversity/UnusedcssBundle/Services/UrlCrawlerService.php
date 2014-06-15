<?php
namespace BionicUniversity\UnusedcssBundle\Services;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpKernel\Client;

class UrlCrawlerService
{
    /*
     * var String
     */
    private $site_url;

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var array
     */
    protected $domainLinks = array();

    /**
     * @return array
     */
    public function getDomainLinks()
    {
        return $this->domainLinks;
    }

    public function __construct($site_url)
    {
        $this->site_url = $site_url;
        $this->domain = parse_url($site_url, PHP_URL_HOST);
        $this->domainLinks = array();
    }

    public function execute()
    {
        foreach ($this->getDomainLinks() as $key => $link) {
            $this->getLinkOnCurrentPage($link);
        }
        foreach ($this->getDomainLinks() as $key => $link) {
            echo $link . PHP_EOL;
        }
    }

    public function getLinkOnCurrentPage($link)
    {
        $html = file_get_contents($link);
        $crawler = new Crawler($html, $link);
        $links = $crawler->filter('a')->each(function (Crawler $node, $i) {
            return $node->link()->getUri();
        });
        foreach ($links as $key => $link) {
            $linkParts = parse_url($link);
            if (empty($linkParts['host']) || $linkParts['host'] !== $this->domain || $linkParts['scheme'] !== 'http'
                || in_array($link, $this->getDomainLinks())
            ) {
                unset($links[$key]);
            }
        }
        foreach ($links as $key => $link) {
            $this->domainLinks[] = $link;
        }
    }

    function parseCSS($css)
    {
        preg_match_all('/(?<=\\#)[_A-Za-z0-9\\-]+(?=[ ]*[{:])/', $css, $matches, PREG_SET_ORDER);
        foreach ($matches as $val) {
            var_dump($val);
        }
        preg_match_all('/(?<=\\.)[_A-Za-z0-9\\-]+(?=[ ]*[{:])/', $css, $matches, PREG_SET_ORDER);
        foreach ($matches as $val) {
            var_dump($val);
        }
    }

    public function getClassAndId($link)
    {
        $html = file_get_contents($link);
        $crawler = new Crawler();
        $crawler->addHtmlContent($html);
        $crawler->filter('')->each(function ($node, $i) {
            if (!empty($node->attr('class'))) {
                echo $node->attr('class') . PHP_EOL;
            }
            if (!empty($node->attr('id'))) {
                echo $node->attr('id') . PHP_EOL;
            }
        });
        $crawler->filter('link[rel=stylesheet]')->each(function ($node, $i) {
            echo $node->attr('href') . PHP_EOL;
            $css = file_get_contents('http://' . $this->domain . $node->attr('href'));
            var_dump($this->parseCSS($css));
        });
    }
}