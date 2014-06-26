<?php
namespace BionicUniversity\UnusedcssBundle\Tests\Services;

use BionicUniversity\UnusedcssBundle\Services\UrlCrawlerService;
use Symfony\Component\DomCrawler\Crawler;
use Doctrine\Common\Collections\ArrayCollection;

class UrlCrawlerServiceTest extends \PHPUnit_Framework_TestCase
{

    protected $html;
    protected $css;

    protected function setUp()
    {
        $this->html = '
        <!DOCTYPE html>
        <html>
            <head>
                <link rel="stylesheet" href="/baseCss.css">
            </head>
            <body>
                <p class="message temp" id="first"><a href="hello_page">Hello World!</a></p>
                <p id="second">Hello Crawler!<a href="http://symfony.com/">Symfony</a></p>
                <div class="trend" id="second"><a href="#" class="link" id="link"></a></div>
                <a href="hello_page"></a>
            </body>
        </html>';
        $this->css = '
                    .trend #test{
                      background: url(images/parallax-bot.png) no-repeat center 0 transparent;
                      height: 50px;
                      position:relative;
                      z-index:1;
                    }
                    #left-para-mask .message #test{
                        background: url("images/left-para-mask.png") repeat scroll 0 0 transparent;
                        height: 400px;
                        float: left;
                        position: relative;
                        margin-top: -400px;
                        width: 130px;
                        z-index: 2;
                    }
                    #right-para-mask {
                        background: url("images/right-para-mask.png") repeat scroll 0 0 transparent;
                        float: right;
                        height: 400px;
                        position: relative;
                        margin-top: -400px;
                        width: 130px;
                        z-index: 2;
                    }
                    .link .trend{
                        border-top: 1px solid #F0F1F8;
                        margin: 30px 0 -30px !important;
                        padding: 25px 0 0;
                        text-align: center;
                    }
                    .link a {
                      color: #008ec9;
                    }
                    ';
    }

    public function testGetLinkOnCurrentPage()
    {
        $crawl = new UrlCrawlerService('http://seo.imaginarium.in.ua/');
        $crawler = new Crawler($this->html, 'http://seo.imaginarium.in.ua/');
        $crawl->getLinkOnCurrentPage($crawler);
        $expected = new ArrayCollection();
        $expected->add('http://seo.imaginarium.in.ua/hello_page');
        $expected->add('http://seo.imaginarium.in.ua/#');
        $actual = $crawl->getDomainLinks();
        $this->assertEquals($expected->toArray(), $actual);
    }

    public function testFindClass()
    {
        $crawler = new Crawler($this->html);
        $expected = new ArrayCollection();
        $expected->add('message');
        $expected->add('temp');
        $expected->add('trend');
        $expected->add('link');
        $crawl = new UrlCrawlerService('http://seo.imaginarium.in.ua');
        $myReflection = new \ReflectionClass($crawl);
        $reflectionMethod = $myReflection->getMethod("findClasses");
        $reflectionMethod->setAccessible(true);
        $reflectionMethod->invokeArgs($crawl, array($crawler));
        $actual = $crawl->getClasses();
        var_dump($actual);
        $this->assertEquals($expected, $actual);
    }

    public function testFindIds()
    {
        $crawler = new Crawler($this->html);
        $expected = new ArrayCollection();
        $expected->add('first');
        $expected->add('second');
        $expected->add('link');
        $crawl = new UrlCrawlerService('http://seo.imaginarium.in.ua');
        $myReflection = new \ReflectionClass($crawl);
        $reflectionMethod = $myReflection->getMethod("findIds");
        $reflectionMethod->setAccessible(true);
        $reflectionMethod->invokeArgs($crawl, array($crawler));
        $actual = $crawl->getIds();
        $this->assertEquals($expected, $actual);
    }

    public function testFindStylesheet()
    {
        $crawler = new Crawler($this->html);
        $expected = new ArrayCollection();
        $expected->add('/baseCss.css');
        $crawl = new UrlCrawlerService('http://seo.imaginarium.in.ua');
        $myReflection = new \ReflectionClass($crawl);
        $reflectionMethod = $myReflection->getMethod("findStylesheet");
        $reflectionMethod->setAccessible(true);
        $reflectionMethod->invokeArgs($crawl, array($crawler));
        $actual = $crawl->getStylesheets();
        $this->assertEquals($expected, $actual);
    }

    public function testParseCssIds()
    {
        $crawl = new UrlCrawlerService('http://seo.imaginarium.in.ua');
        $expected = new ArrayCollection();
        $expected->add('test');
        $expected->add('left-para-mask');
        $expected->add('right-para-mask');
        $myReflection = new \ReflectionClass($crawl);
        $reflectionMethod = $myReflection->getMethod("parseCssIds");
        $reflectionMethod->setAccessible(true);
        $reflectionMethod->invokeArgs($crawl, array($this->css));
        $actual = $crawl->getCSSids();
        $this->assertEquals($expected, $actual);
    }

    public function testParseCssClasses()
    {
        $crawl = new UrlCrawlerService('http://seo.imaginarium.in.ua');
        $expected = new ArrayCollection();
        $expected->add('trend');
        $expected->add('message');
        $expected->add('link');
        $myReflection = new \ReflectionClass($crawl);
        $reflectionMethod = $myReflection->getMethod("parseCSSclasses");
        $reflectionMethod->setAccessible(true);
        $reflectionMethod->invokeArgs($crawl, array($this->css));
        $actual = $crawl->getCSSclasses();
        $this->assertEquals($expected, $actual);
    }


    public function testExecute()
    {
        $crawl = new UrlCrawlerService('http://unused.imaginarium.in.ua');
        $crawl->execute();
        var_dump($crawl->getDomainLinks());
        $crawl->getClasses();
        var_dump($crawl->getStylesheets());
        $crawl->getCSSclasses();
        $crawl->getCSSids();
        $this->assertEquals(true, true);
    }
}
