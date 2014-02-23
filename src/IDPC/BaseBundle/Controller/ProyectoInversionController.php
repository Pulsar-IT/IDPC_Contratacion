<?php

namespace IDPC\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\BaseBundle\Entity\ProyectoInversion;
use IDPC\BaseBundle\Form\ProyectoInversionType;

/**
 * ProyectoInversion controller.
 *
 * @Route("/proyectoinversion")
 */
class ProyectoInversionController extends Controller
{

    /**
     * Lists all ProyectoInversion entities.
     *
     * @Route("/", name="proyectoinversion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCBaseBundle:ProyectoInversion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ProyectoInversion entity.
     *
     * @Route("/", name="proyectoinversion_create")
     * @Method("POST")
     * @Template("IDPCBaseBundle:ProyectoInversion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ProyectoInversion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proyectoinversion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ProyectoInversion entity.
    *
    * @param ProyectoInversion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ProyectoInversion $entity)
    {
        $form = $this->createForm(new ProyectoInversionType(), $entity, array(
            'action' => $this->generateUrl('proyectoinversion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ProyectoInversion entity.
     *
     * @Route("/new", name="proyectoinversion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ProyectoInversion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ProyectoInversion entity.
     *
     * @Route("/{id}", name="proyectoinversion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:ProyectoInversion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProyectoInversion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ProyectoInversion entity.
     *
     * @Route("/{id}/edit", name="proyectoinversion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:ProyectoInversion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProyectoInversion entity.');
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
    * Creates a form to edit a ProyectoInversion entity.
    *
    * @param ProyectoInversion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ProyectoInversion $entity)
    {
        $form = $this->createForm(new ProyectoInversionType(), $entity, array(
            'action' => $this->generateUrl('proyectoinversion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ProyectoInversion entity.
     *
     * @Route("/{id}", name="proyectoinversion_update")
     * @Method("PUT")
     * @Template("IDPCBaseBundle:ProyectoInversion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCBaseBundle:ProyectoInversion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProyectoInversion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proyectoinversion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ProyectoInversion entity.
     *
     * @Route("/{id}", name="proyectoinversion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCBaseBundle:ProyectoInversion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProyectoInversion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('proyectoinversion'));
    }

    /**
     * Creates a form to delete a ProyectoInversion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyectoinversion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
