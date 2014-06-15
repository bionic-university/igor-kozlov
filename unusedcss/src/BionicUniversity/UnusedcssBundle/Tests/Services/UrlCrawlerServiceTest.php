<?php
namespace BionicUniversity\UnusedcssBundle\Tests\Services;

use BionicUniversity\UnusedcssBundle\Services\UrlCrawlerService;

class UrlCrawlerServiceTest extends \PHPUnit_Framework_TestCase
{
    /*public function testGetLinkOnCurrentPage()
    {
        $crawl = new UrlCrawlerService('http://seo.imaginarium.in.ua');
        $crawl->getLinkOnCurrentPage('http://seo.imaginarium.in.ua');
        $this->assertEquals(true, true);
    }

    public function testGetLinks()
    {
        $crawl = new UrlCrawlerService('http://wizardry.ua/company/');
        $crawl->getLinkOnCurrentPage('http://wizardry.ua/company/');
        $crawl->execute();
        $this->assertEquals(true, true);
    }
*/
    public function testGetClass()
    {
        $crawl = new UrlCrawlerService('http://wizardry.ua/company/');
        $crawl->getClassAndId('http://wizardry.ua/company/');
        $this->assertEquals(true, true);
    }
}
 