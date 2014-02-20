<?php

namespace IDPC\ContractualBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\ContractualBundle\Entity\Contrato;
use IDPC\ContractualBundle\Form\ContratoType;

/**
 * Contrato controller.
 *
 * @Route("/contrato")
 */
class ContratoController extends Controller
{

    /**
     * Lists all Contrato entities.
     *
     * @Route("/", name="contrato")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCContractualBundle:Contrato')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Contrato entity.
     *
     * @Route("/", name="contrato_create")
     * @Method("POST")
     * @Template("IDPCContractualBundle:Contrato:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Contrato();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contrato_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Contrato entity.
    *
    * @param Contrato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Contrato $entity)
    {
        $form = $this->createForm(new ContratoType(), $entity, array(
            'action' => $this->generateUrl('contrato_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Contrato entity.
     *
     * @Route("/new", name="contrato_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Contrato();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Contrato entity.
     *
     * @Route("/{id}", name="contrato_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Contrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contrato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Contrato entity.
     *
     * @Route("/{id}/edit", name="contrato_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Contrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contrato entity.');
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
    * Creates a form to edit a Contrato entity.
    *
    * @param Contrato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Contrato $entity)
    {
        $form = $this->createForm(new ContratoType(), $entity, array(
            'action' => $this->generateUrl('contrato_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Contrato entity.
     *
     * @Route("/{id}", name="contrato_update")
     * @Method("PUT")
     * @Template("IDPCContractualBundle:Contrato:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Contrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contrato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('contrato_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Contrato entity.
     *
     * @Route("/{id}", name="contrato_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCContractualBundle:Contrato')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contrato entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contrato'));
    }

    /**
     * Creates a form to delete a Contrato entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contrato_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
