<?php

namespace IDPC\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\BaseBundle\Entity\Cdp;
use IDPC\BaseBundle\Form\CdpType;

/**
 * Cdp controller.
 *
 * @Route("/cdp")
 */
class CdpController extends Controller
{

    /**
     * Lists all Cdp entities.
     *
     * @Route("/", name="cdp")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCBaseBundle:Cdp')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Cdp entity.
     *
     * @Route("/", name="cdp_create")
     * @Method("POST")
     * @Template("IDPCBaseBundle:Cdp:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Cdp();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cdp_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Cdp entity.
    *
    * @param Cdp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Cdp $entity)
    {
        $form = $this->createForm(new CdpType(), $entity, array(
            'action' => $this->generateUrl('cdp_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cdp entity.
     *
     * @Route("/new", name="cdp_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cdp();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cdp entity.
     *
     * @Route("/{id}", name="cdp_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:Cdp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cdp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cdp entity.
     *
     * @Route("/{id}/edit", name="cdp_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:Cdp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cdp entity.');
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
    * Creates a form to edit a Cdp entity.
    *
    * @param Cdp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cdp $entity)
    {
        $form = $this->createForm(new CdpType(), $entity, array(
            'action' => $this->generateUrl('cdp_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cdp entity.
     *
     * @Route("/{id}", name="cdp_update")
     * @Method("PUT")
     * @Template("IDPCBaseBundle:Cdp:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:Cdp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cdp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cdp_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Cdp entity.
     *
     * @Route("/{id}", name="cdp_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCBaseBundle:Cdp')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cdp entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cdp'));
    }

    /**
     * Creates a form to delete a Cdp entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cdp_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
