<?php

namespace BionicUniversity\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 *
 * @package BionicUniversity\UserBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @param $name
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        return $this->render('BionicUniversityUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
