<?php

namespace BionicUniversity\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BionicUniversity\UserBundle\Form\Type\RegistrationType;
use BionicUniversity\UserBundle\Form\Model\Registration;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\SecurityContextInterface;

class AccountController extends Controller
{

    public function registerAction()
    {
        if ($this->getUser()) {
            return $this->redirect($this->generateUrl('bionic_university_unusedcss_homepage'));
        }
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'BionicUniversityUserBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationType(), new Registration());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $factory = $this->get('security.encoder_factory');
            $user = $form->getData()->getUser();
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
            $user->setPassword($password);
            $role = $em->getRepository('BionicUniversityUserBundle:Role')->findOneByRole('ROLE_USER');
            if ($role) {
                $user->addRole($role);
            }
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('bionic_university_unusedcss_homepage'));
        }

        return $this->render(
            'BionicUniversityUserBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function loginAction(Request $request)
    {
        if ($this->getUser()) {
            return $this->redirect($this->generateUrl('bionic_university_unusedcss_homepage'));
        }

        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        return $this->render(
            'BionicUniversityUserBundle:Account:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }

    public function dumpStringAction()
    {
        return $this->render('BionicUniversityUserBundle:Account:dumpString.html.twig', array());
    }
}
