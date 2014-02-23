<?php

namespace IDPC\SolicitudBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\SolicitudBundle\Entity\EstudioPrevio;
use IDPC\SolicitudBundle\Form\EstudioPrevioType;

/**
 * EstudioPrevio controller.
 *
 * @Route("/estudiosprevios")
 */
class EstudioPrevioController extends Controller
{

    /**
     * Lists all EstudioPrevio entities.
     *
     * @Route("/", name="estudiosprevios")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCSolicitudBundle:EstudioPrevio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EstudioPrevio entity.
     *
     * @Route("/", name="estudiosprevios_create")
     * @Method("POST")
     * @Template("IDPCSolicitudBundle:EstudioPrevio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EstudioPrevio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudiosprevios_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a EstudioPrevio entity.
    *
    * @param EstudioPrevio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(EstudioPrevio $entity)
    {
        $form = $this->createForm(new EstudioPrevioType(), $entity, array(
            'action' => $this->generateUrl('estudiosprevios_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EstudioPrevio entity.
     *
     * @Route("/new", name="estudiosprevios_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EstudioPrevio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EstudioPrevio entity.
     *
     * @Route("/{id}", name="estudiosprevios_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCSolicitudBundle:EstudioPrevio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioPrevio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EstudioPrevio entity.
     *
     * @Route("/{id}/edit", name="estudiosprevios_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCSolicitudBundle:EstudioPrevio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioPrevio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a EstudioPrevio entity.
    *
    * @param EstudioPrevio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EstudioPrevio $entity)
    {
        $form = $this->createForm(new EstudioPrevioType(), $entity, array(
            'action' => $this->generateUrl('estudiosprevios_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EstudioPrevio entity.
     *
     * @Route("/{id}", name="estudiosprevios_update")
     * @Method("PUT")
     * @Template("IDPCSolicitudBundle:EstudioPrevio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCSolicitudBundle:EstudioPrevio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudioPrevio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estudiosprevios_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EstudioPrevio entity.
     *
     * @Route("/{id}", name="estudiosprevios_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCSolicitudBundle:EstudioPrevio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstudioPrevio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estudiosprevios'));
    }

    /**
     * Creates a form to delete a EstudioPrevio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estudiosprevios_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
