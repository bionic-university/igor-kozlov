<?php

namespace BionicUniversity\UnusedcssBundle\Tests\Services;

use BionicUniversity\UnusedcssBundle\Services\ValidatorService;

/**
 * Class ValidatorServiceTest
 *
 * @package BionicUniversity\UnusedcssBundle\Tests\Services
 */
class ValidatorServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * w3c validator test
     */
    public function testValidate()
    {
        $validator = new ValidatorService('http://unused.imaginarium.in.ua/one.html');
        $actual = $validator->validateInput(file_get_contents('http://unused.imaginarium.in.ua/one.html'));
        $expected = true;
        $this->assertEquals($expected,$actual);
    }
}
 