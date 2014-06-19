<?php
namespace BionicUniversity\UnusedcssBundle\Services;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpKernel\Client;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @var ArrayCollection
     */
    protected $classes;

    /**
     * @var ArrayCollection
     */
    protected $ids;

    /**
     * @var ArrayCollection
     */
    protected $stylesheets;

    /**
     * @var ArrayCollection
     */
    protected $CSSclasses;

    /**
     * @var ArrayCollection
     */
    protected $CSSids;


    public function __construct($site_url)
    {
        $this->site_url = $site_url;
        $this->domain = parse_url($site_url, PHP_URL_HOST);
        $this->domainLinks = array();
        $this->classes = new ArrayCollection();
        $this->ids = new ArrayCollection();
        $this->stylesheets = new ArrayCollection();
        $this->CSSclasses = new ArrayCollection();
        $this->CSSids = new ArrayCollection();
    }


    /**
     * @return ArrayCollection
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * @return array
     */
    public function getDomainLinks()
    {
        return $this->domainLinks;
    }

    /**
     * @return ArrayCollection
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @return ArrayCollection
     */
    public function getStylesheets()
    {
        return $this->stylesheets;
    }

    /**
     * @return ArrayCollection
     */
    public function getCSSclasses()
    {
        return $this->CSSclasses;
    }

    /**
     * @return ArrayCollection
     */
    public function getCSSids()
    {
        return $this->CSSids;
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
    //@TODO: find solution for double classes
    private function parseCSSclasses($css)
    {
        preg_match_all('/(?<=\\.)[_A-Za-z0-9\\-]+(?=[ ]*[{:])/', $css, $matches, PREG_SET_ORDER);
        foreach ($matches as $val) {
            var_dump($val);
            $this->CSSclasses->add($val[0]);
        }
    }

    private function parseCssIds($css)
    {
        preg_match_all('/(?<=\\#)[_A-Za-z0-9\\-]+(?=[ ]*[{:])/', $css, $matches, PREG_SET_ORDER);
        foreach ($matches as $val) {
            $this->CSSids->add($val[0]);
        }
    }

    //@TODO: find solution for double classes
    private function findClasses(Crawler $crawler)
    {
        $crawler->filter('')->each(function ($node, $i) {
            if (!empty($node->attr('class'))) {
                $this->classes->add($node->attr('class'));
            }
        });
    }

    private function findIds(Crawler $crawler)
    {
        $crawler->filter('')->each(function ($node, $i) {
            if (!empty($node->attr('id'))) {
                $this->ids->add($node->attr('id'));
            }
        });
    }

    private function findStylesheet(Crawler $crawler)
    {
        $crawler->filter('link[rel=stylesheet]')->each(function ($node, $i) {
            echo $node->attr('href') . PHP_EOL;
            if (!empty($node->attr('href'))) {
                $this->stylesheets->add($node->attr('href'));
            }
        });
    }
}