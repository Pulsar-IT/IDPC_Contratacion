<?php

namespace IDPC\ContractualBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\ContractualBundle\Entity\SolicitudPago;
use IDPC\ContractualBundle\Form\SolicitudPagoType;

/**
 * SolicitudPago controller.
 *
 * @Route("/solicitudpago")
 */
class SolicitudPagoController extends Controller
{

    /**
     * Lists all SolicitudPago entities.
     *
     * @Route("/", name="solicitudpago")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCContractualBundle:SolicitudPago')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new SolicitudPago entity.
     *
     * @Route("/", name="solicitudpago_create")
     * @Method("POST")
     * @Template("IDPCContractualBundle:SolicitudPago:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new SolicitudPago();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('solicitudpago_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a SolicitudPago entity.
    *
    * @param SolicitudPago $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SolicitudPago $entity)
    {
        $form = $this->createForm(new SolicitudPagoType(), $entity, array(
            'action' => $this->generateUrl('solicitudpago_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SolicitudPago entity.
     *
     * @Route("/new", name="solicitudpago_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new SolicitudPago();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a SolicitudPago entity.
     *
     * @Route("/{id}", name="solicitudpago_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:SolicitudPago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolicitudPago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing SolicitudPago entity.
     *
     * @Route("/{id}/edit", name="solicitudpago_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:SolicitudPago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolicitudPago entity.');
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
    * Creates a form to edit a SolicitudPago entity.
    *
    * @param SolicitudPago $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SolicitudPago $entity)
    {
        $form = $this->createForm(new SolicitudPagoType(), $entity, array(
            'action' => $this->generateUrl('solicitudpago_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SolicitudPago entity.
     *
     * @Route("/{id}", name="solicitudpago_update")
     * @Method("PUT")
     * @Template("IDPCContractualBundle:SolicitudPago:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:SolicitudPago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SolicitudPago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('solicitudpago_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a SolicitudPago entity.
     *
     * @Route("/{id}", name="solicitudpago_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCContractualBundle:SolicitudPago')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SolicitudPago entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('solicitudpago'));
    }

    /**
     * Creates a form to delete a SolicitudPago entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('solicitudpago_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
