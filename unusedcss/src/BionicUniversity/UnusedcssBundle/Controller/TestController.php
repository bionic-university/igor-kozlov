<?php

namespace BionicUniversity\UnusedcssBundle\Controller;

use BionicUniversity\UnusedcssBundle\Entity\Link;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Collections\ArrayCollection;
use BionicUniversity\UnusedcssBundle\Form\Type\TestType;
use Symfony\Component\HttpFoundation\Request;
use BionicUniversity\UnusedcssBundle\Entity\TestResult;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Class TestController
 *
 * @package BionicUniversity\UnusedcssBundle\Controller
 */
class TestController extends Controller
{
    /**
     * @param $name
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('bionic_university_unusedcss_homepage'));
        }
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $entities = $em->getRepository('BionicUniversityUnusedcssBundle:TestResult')->findBy(array('user' => $user));
        return $this->render('BionicUniversityUnusedcssBundle:Test:list.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BionicUniversityUnusedcssBundle:TestResult')->findOneById($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestResult entity.');
        }
        return $this->render('BionicUniversityUnusedcssBundle:Test:show.html.twig', array(
            'entity' => $entity
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function crawlAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('bionic_university_unusedcss_homepage'));
        }
        $test = new TestResult();
        $form = $this->createForm(new TestType(), $test, array(
            'action' => $this->generateUrl('bionic_university_unusedcss_test_create'),
        ));
        return $this->render(
            'BionicUniversityUnusedcssBundle:Test:crawl.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new TestType());
        $test = new TestResult();
        $user = $this->get('security.context')->getToken()->getUser();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $url = $form->getData()->getUrl();
            $crawler = $this->get('bionic_university_unusedcss.agregator');
            $crawler->__construct($url);
            $crawler->execute();
            $linksArr = $crawler->getDomainLinks();
            foreach ($linksArr as $value) {
                $link = new Link();
                $validator = $this->get('bionic_university_unusedcss.validator');
                $validator->__construct($value);
                $result = $validator->validateInput();
                if ($result) {
                    $link->setValidationResult('Success');
                } else {
                    $link->setValidationResult('Failure');
                }
                $link->setTest($test);
                $link->setLink($value);
                $em->persist($link);
            }
            $test->setUser($user);
            $test->setUnusedClasses(implode(',', $crawler->getUnusedClass()));
            $test->setUnusedIds(implode(',', $crawler->getUnusedId()));
            $test->setUrl($url);
            $em->persist($test);
            $em->flush();

            $unusedClass = $test->getUnusedClasses();
            $unusedIdx = $test->getUnusedIds();
            $foundedLinks = $em->getRepository('BionicUniversityUnusedcssBundle:Link')->findBy(array('test' => $test));
            return $this->render('BionicUniversityUnusedcssBundle:Test:testResult.html.twig',
                array('form' => $form->createView(), 'classes' => $unusedClass, 'ids' => $unusedIdx, 'links' => $foundedLinks));
        }

        return $this->render(
            'BionicUniversityUnusedcssBundle:Test:crawl.html.twig',
            array('form' => $form->createView())
        );
    }
}
