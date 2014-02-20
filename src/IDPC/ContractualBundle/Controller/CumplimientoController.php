<?php

namespace IDPC\ContractualBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\ContractualBundle\Entity\Cumplimiento;
use IDPC\ContractualBundle\Form\CumplimientoType;

/**
 * Cumplimiento controller.
 *
 * @Route("/cumplimiento")
 */
class CumplimientoController extends Controller
{

    /**
     * Lists all Cumplimiento entities.
     *
     * @Route("/", name="cumplimiento")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCContractualBundle:Cumplimiento')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Cumplimiento entity.
     *
     * @Route("/", name="cumplimiento_create")
     * @Method("POST")
     * @Template("IDPCContractualBundle:Cumplimiento:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Cumplimiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cumplimiento_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Cumplimiento entity.
    *
    * @param Cumplimiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Cumplimiento $entity)
    {
        $form = $this->createForm(new CumplimientoType(), $entity, array(
            'action' => $this->generateUrl('cumplimiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cumplimiento entity.
     *
     * @Route("/new", name="cumplimiento_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cumplimiento();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cumplimiento entity.
     *
     * @Route("/{id}", name="cumplimiento_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Cumplimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cumplimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cumplimiento entity.
     *
     * @Route("/{id}/edit", name="cumplimiento_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Cumplimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cumplimiento entity.');
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
    * Creates a form to edit a Cumplimiento entity.
    *
    * @param Cumplimiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cumplimiento $entity)
    {
        $form = $this->createForm(new CumplimientoType(), $entity, array(
            'action' => $this->generateUrl('cumplimiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cumplimiento entity.
     *
     * @Route("/{id}", name="cumplimiento_update")
     * @Method("PUT")
     * @Template("IDPCContractualBundle:Cumplimiento:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Cumplimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cumplimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cumplimiento_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Cumplimiento entity.
     *
     * @Route("/{id}", name="cumplimiento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCContractualBundle:Cumplimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cumplimiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cumplimiento'));
    }

    /**
     * Creates a form to delete a Cumplimiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cumplimiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
