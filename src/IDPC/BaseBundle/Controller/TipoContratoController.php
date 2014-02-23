<?php

namespace IDPC\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\BaseBundle\Entity\TipoContrato;
use IDPC\BaseBundle\Form\TipoContratoType;

/**
 * TipoContrato controller.
 *
 * @Route("/tipocontrato")
 */
class TipoContratoController extends Controller
{

    /**
     * Lists all TipoContrato entities.
     *
     * @Route("/", name="tipocontrato")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCBaseBundle:TipoContrato')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TipoContrato entity.
     *
     * @Route("/", name="tipocontrato_create")
     * @Method("POST")
     * @Template("IDPCBaseBundle:TipoContrato:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TipoContrato();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipocontrato_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a TipoContrato entity.
    *
    * @param TipoContrato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TipoContrato $entity)
    {
        $form = $this->createForm(new TipoContratoType(), $entity, array(
            'action' => $this->generateUrl('tipocontrato_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoContrato entity.
     *
     * @Route("/new", name="tipocontrato_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoContrato();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TipoContrato entity.
     *
     * @Route("/{id}", name="tipocontrato_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:TipoContrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoContrato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoContrato entity.
     *
     * @Route("/{id}/edit", name="tipocontrato_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:TipoContrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoContrato entity.');
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
    * Creates a form to edit a TipoContrato entity.
    *
    * @param TipoContrato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoContrato $entity)
    {
        $form = $this->createForm(new TipoContratoType(), $entity, array(
            'action' => $this->generateUrl('tipocontrato_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoContrato entity.
     *
     * @Route("/{id}", name="tipocontrato_update")
     * @Method("PUT")
     * @Template("IDPCBaseBundle:TipoContrato:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:TipoContrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoContrato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipocontrato_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TipoContrato entity.
     *
     * @Route("/{id}", name="tipocontrato_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCBaseBundle:TipoContrato')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoContrato entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipocontrato'));
    }

    /**
     * Creates a form to delete a TipoContrato entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipocontrato_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
