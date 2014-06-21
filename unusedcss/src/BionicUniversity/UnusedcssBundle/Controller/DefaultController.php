<?php

namespace BionicUniversity\UnusedcssBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BionicUniversityUnusedcssBundle:Default:index.html.twig');
    }
}
