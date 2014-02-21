<?php

namespace IDPC\SolicitudBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\SolicitudBundle\Entity\EstudiosPrevios;
use IDPC\SolicitudBundle\Form\EstudiosPreviosType;

/**
 * EstudiosPrevios controller.
 *
 * @Route("/estudiosprevios")
 */
class EstudiosPreviosController extends Controller
{

    /**
     * Lists all EstudiosPrevios entities.
     *
     * @Route("/", name="estudiosprevios")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCSolicitudBundle:EstudiosPrevios')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EstudiosPrevios entity.
     *
     * @Route("/", name="estudiosprevios_create")
     * @Method("POST")
     * @Template("IDPCSolicitudBundle:EstudiosPrevios:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EstudiosPrevios();
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
    * Creates a form to create a EstudiosPrevios entity.
    *
    * @param EstudiosPrevios $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(EstudiosPrevios $entity)
    {
        $form = $this->createForm(new EstudiosPreviosType(), $entity, array(
            'action' => $this->generateUrl('estudiosprevios_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EstudiosPrevios entity.
     *
     * @Route("/new", name="estudiosprevios_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EstudiosPrevios();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EstudiosPrevios entity.
     *
     * @Route("/{id}", name="estudiosprevios_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCSolicitudBundle:EstudiosPrevios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudiosPrevios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EstudiosPrevios entity.
     *
     * @Route("/{id}/edit", name="estudiosprevios_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCSolicitudBundle:EstudiosPrevios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudiosPrevios entity.');
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
    * Creates a form to edit a EstudiosPrevios entity.
    *
    * @param EstudiosPrevios $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EstudiosPrevios $entity)
    {
        $form = $this->createForm(new EstudiosPreviosType(), $entity, array(
            'action' => $this->generateUrl('estudiosprevios_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EstudiosPrevios entity.
     *
     * @Route("/{id}", name="estudiosprevios_update")
     * @Method("PUT")
     * @Template("IDPCSolicitudBundle:EstudiosPrevios:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCSolicitudBundle:EstudiosPrevios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudiosPrevios entity.');
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
     * Deletes a EstudiosPrevios entity.
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
            $entity = $em->getRepository('IDPCSolicitudBundle:EstudiosPrevios')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstudiosPrevios entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estudiosprevios'));
    }

    /**
     * Creates a form to delete a EstudiosPrevios entity by id.
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
