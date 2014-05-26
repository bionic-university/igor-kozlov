<?php

namespace BionicUniversity\StudentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BionicUniversityStudentBundle:Default:index.html.twig', array());
    }
}
