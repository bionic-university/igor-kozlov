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
     * @var ArrayCollection
     */
    protected $domainLinks;

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
        $this->domainLinks = new ArrayCollection();
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
     * @return ArrayCollection
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

    public function execute($crawler,$html)
    {

        $this->findClasses($crawler);
        $this->getClasses();
        $this->findStylesheet($crawler);
        $this->parseCSSclasses($html);
        $this->getCSSclasses();
        var_dump($this->margeCollection($this->getClasses(),$this->getCSSclasses()));
    }

    public function getLinkOnCurrentPage(Crawler $crawler)
    {
        $links = $crawler->filter('a')->each(function (Crawler $node, $i) {
            return $node->link()->getUri();
        });
        foreach ($links as $key => $link) {
            $linkParts = parse_url($link);
            if (empty($linkParts['host']) || $linkParts['host'] !== $this->domain || $linkParts['scheme'] !== 'http') {
                unset($links[$key]);
            }
        }
        foreach ($links as $key => $link) {
            if (!$this->domainLinks->contains($link)) {
                $this->domainLinks->add($link);
            }
        }
    }

    private function parseCSSclasses($css)
    {
        preg_match_all('/(?<=\\.)[_A-Za-z0-9\\-]+(?=[ ]*[.#{:])/', $css, $matches, PREG_SET_ORDER);
        foreach ($matches as $val) {
            if (!$this->CSSclasses->contains($val[0])) {
                $this->CSSclasses->add($val[0]);
            }
        }
    }

    private function parseCssIds($css)
    {
        preg_match_all('/(?<=\\#)[_A-Za-z0-9\\-]+(?=[ ]*[.#{:])/', $css, $matches, PREG_SET_ORDER);
        foreach ($matches as $val) {
            if (!$this->CSSids->contains($val[0])) {
                $this->CSSids->add($val[0]);
            }
        }
    }

    private function findClasses(Crawler $crawler)
    {
        $crawler->filter('')->each(function ($node, $i) {
            if (!empty($node->attr('class'))) {
                if (strpos($node->attr('class'), " ") != false) {
                    $pieces = explode(" ", $node->attr('class'));
                    foreach ($pieces as $value) {
                        if (!$this->classes->contains($value)) {
                            $this->classes->add($value);
                        }
                    }
                } else {
                    if (!$this->classes->contains($node->attr('class'))) {
                        $this->classes->add($node->attr('class'));
                    }
                }
            }
        });
    }

    private function findIds(Crawler $crawler)
    {
        $crawler->filter('')->each(function ($node, $i) {
            if (!empty($node->attr('id'))) {
                if (!$this->ids->contains($node->attr('id'))) {
                    $this->ids->add($node->attr('id'));
                }
            }
        });
    }

    private function findStylesheet(Crawler $crawler)
    {
        $crawler->filter('link[rel=stylesheet]')->each(function ($node, $i) {
            if (!empty($node->attr('href'))) {
                if (!$this->stylesheets->contains($node->attr('href'))) {
                    $this->stylesheets->add($node->attr('href'));
                }
            }
        });
    }

    private function margeCollection(ArrayCollection $inHtml, ArrayCollection $inCSS)
    {
        var_dump($inHtml);
        var_dump($inCSS);
        $unused = new ArrayCollection(
            array_diff($inHtml->toArray(), $inCSS->toArray())
        );
        return $unused;
    }
}