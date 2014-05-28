<?php

namespace BionicUniversity\StudentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BionicUniversity\StudentBundle\Entity\Cafedra;
use BionicUniversity\StudentBundle\Form\CafedraType;

/**
 * Cafedra controller.
 *
 */
class CafedraController extends Controller
{

    /**
     * Lists all Cafedra entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BionicUniversityStudentBundle:Cafedra')->findAll();

        return $this->render('BionicUniversityStudentBundle:Cafedra:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Cafedra entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Cafedra();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cafedra_show', array('id' => $entity->getId())));
        }

        return $this->render('BionicUniversityStudentBundle:Cafedra:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Cafedra entity.
     *
     * @param Cafedra $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cafedra $entity)
    {
        $form = $this->createForm(new CafedraType(), $entity, array(
            'action' => $this->generateUrl('cafedra_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cafedra entity.
     *
     */
    public function newAction()
    {
        $entity = new Cafedra();
        $form = $this->createCreateForm($entity);

        return $this->render('BionicUniversityStudentBundle:Cafedra:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cafedra entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BionicUniversityStudentBundle:Cafedra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cafedra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BionicUniversityStudentBundle:Cafedra:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Cafedra entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BionicUniversityStudentBundle:Cafedra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cafedra entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BionicUniversityStudentBundle:Cafedra:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Cafedra entity.
     *
     * @param Cafedra $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Cafedra $entity)
    {
        $form = $this->createForm(new CafedraType(), $entity, array(
            'action' => $this->generateUrl('cafedra_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Cafedra entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BionicUniversityStudentBundle:Cafedra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cafedra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cafedra_edit', array('id' => $id)));
        }

        return $this->render('BionicUniversityStudentBundle:Cafedra:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cafedra entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BionicUniversityStudentBundle:Cafedra')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cafedra entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cafedra'));
    }

    /**
     * Creates a form to delete a Cafedra entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cafedra_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
