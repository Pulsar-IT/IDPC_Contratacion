<?php

namespace IDPC\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\BaseBundle\Entity\Pmr;
use IDPC\BaseBundle\Form\PmrType;

/**
 * Pmr controller.
 *
 * @Route("/pmr")
 */
class PmrController extends Controller
{

    /**
     * Lists all Pmr entities.
     *
     * @Route("/", name="pmr")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCBaseBundle:Pmr')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Pmr entity.
     *
     * @Route("/", name="pmr_create")
     * @Method("POST")
     * @Template("IDPCBaseBundle:Pmr:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Pmr();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pmr_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Pmr entity.
    *
    * @param Pmr $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Pmr $entity)
    {
        $form = $this->createForm(new PmrType(), $entity, array(
            'action' => $this->generateUrl('pmr_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pmr entity.
     *
     * @Route("/new", name="pmr_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Pmr();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Pmr entity.
     *
     * @Route("/{id}", name="pmr_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:Pmr')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pmr entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Pmr entity.
     *
     * @Route("/{id}/edit", name="pmr_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:Pmr')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pmr entity.');
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
    * Creates a form to edit a Pmr entity.
    *
    * @param Pmr $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pmr $entity)
    {
        $form = $this->createForm(new PmrType(), $entity, array(
            'action' => $this->generateUrl('pmr_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pmr entity.
     *
     * @Route("/{id}", name="pmr_update")
     * @Method("PUT")
     * @Template("IDPCBaseBundle:Pmr:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:Pmr')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pmr entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pmr_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Pmr entity.
     *
     * @Route("/{id}", name="pmr_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCBaseBundle:Pmr')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pmr entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pmr'));
    }

    /**
     * Creates a form to delete a Pmr entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pmr_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
