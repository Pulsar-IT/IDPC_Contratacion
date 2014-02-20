<?php

namespace Security\SecurityBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Security\SecurityBundle\Entity\UserDet;
use Security\SecurityBundle\Form\UserDetType;

/**
 * UserDet controller.
 *
 * @Route("/admin/security/userdet")
 */
class UserDetController extends Controller
{

    /**
     * Lists all UserDet entities.
     *
     * @Route("/", name="admin_security_userdet")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SecuritySecurityBundle:UserDet')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new UserDet entity.
     *
     * @Route("/", name="admin_security_userdet_create")
     * @Method("POST")
     * @Template("SecuritySecurityBundle:UserDet:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new UserDet();
        $form = $this->createForm(new UserDetType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_security_userdet_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new UserDet entity.
     *
     * @Route("/new", name="admin_security_userdet_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new UserDet();
        $form   = $this->createForm(new UserDetType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a UserDet entity.
     *
     * @Route("/{id}", name="admin_security_userdet_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SecuritySecurityBundle:UserDet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserDet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing UserDet entity.
     *
     * @Route("/{id}/edit", name="admin_security_userdet_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SecuritySecurityBundle:UserDet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserDet entity.');
        }

        $editForm = $this->createForm(new UserDetType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing UserDet entity.
     *
     * @Route("/{id}", name="admin_security_userdet_update")
     * @Method("PUT")
     * @Template("SecuritySecurityBundle:UserDet:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SecuritySecurityBundle:UserDet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserDet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UserDetType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_security_userdet_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a UserDet entity.
     *
     * @Route("/{id}", name="admin_security_userdet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SecuritySecurityBundle:UserDet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UserDet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_security_userdet'));
    }

    /**
     * Creates a form to delete a UserDet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
