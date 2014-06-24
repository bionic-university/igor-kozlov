<?php

namespace BionicUniversity\UnusedcssBundle\Services;


/**
 * Class ValidatorService
 *
 * @package BionicUniversity\UnusedcssBundle\Services
 */
class ValidatorService
{
    /**
     * @var string
     */
    private $baseUrl = 'http://validator.w3.org/check';
    /**
     * @var string
     */
    private $url = '';
    /**
     * @var string
     */
    private $html = '';
    /**
     * @var string
     */
    private $response;

    /**
     * @param $site_url
     */
    function __construct($site_url)
    {
        $this->url = $site_url;
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        $this->html = curl_exec($ch);

    }

    /**
     * @param $html
     *
     * @return bool
     */
    public function validateInput()
    {
        $data = array('fragment' => $this->html);
        return $this->validate($data);
    }

    /**
     * @param $data
     *
     * @return bool
     */
    private function validate($data)
    {
        $data['output'] = 'soap12';

        $resource = curl_init($this->baseUrl);
        curl_setopt($resource, CURLOPT_USERAGENT, 'curl');
        curl_setopt($resource, CURLOPT_POST, true);
        curl_setopt($resource, CURLOPT_POSTFIELDS, $data);
        curl_setopt($resource, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($resource);
        $this->response = $response;
        return $this->parseResponse();
    }

    /**
     * @return bool
     */
    private function parseResponse()
    {
        $a = strpos($this->response, '<m:validity>', 0) + 12;
        $b = strpos($this->response, '</m:validity>', $a);
        $resultString = substr($this->response, $a, $b - $a);
        if ($resultString == 'true') {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

}