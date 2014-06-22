<?php

namespace BionicUniversity\UnusedcssBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BionicUniversity\UnusedcssBundle\Form\Type\TestType;
use Symfony\Component\HttpFoundation\Request;
use BionicUniversity\UnusedcssBundle\Entity\TestResult;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\SecurityContextInterface;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BionicUniversityUnusedcssBundle:Default:index.html.twig');
    }

    public function crawlAction() {
        $test= new TestResult();
        $form = $this->createForm(new TestType(), $test,array(
            'action' => $this->generateUrl('bionic_university_unusedcss_test_create'),
        ));
        return $this->render(
            'BionicUniversityUnusedcssBundle:Default:crawl.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new TestType());
        $user= $this->get('security.context')->getToken()->getUser();
        $form->handleRequest($request);

        if ($form->isValid()) {

        }
    }
}
