<?php

namespace IDPC\ContractualBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\ContractualBundle\Entity\Declaracion;
use IDPC\ContractualBundle\Form\DeclaracionType;

/**
 * Declaracion controller.
 *
 * @Route("/declaracion")
 */
class DeclaracionController extends Controller
{

    /**
     * Lists all Declaracion entities.
     *
     * @Route("/", name="declaracion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCContractualBundle:Declaracion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Declaracion entity.
     *
     * @Route("/", name="declaracion_create")
     * @Method("POST")
     * @Template("IDPCContractualBundle:Declaracion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Declaracion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $pago = $em->getRepository('IDPCContractualBundle:Pago')->find($request->getSession()->get('pagoId'));
            
            $entity->setPago($pago);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pago_show', array('id' => $request->getSession()->get('pagoId'))));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Declaracion entity.
    *
    * @param Declaracion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Declaracion $entity)
    {
        $form = $this->createForm(new DeclaracionType(), $entity, array(
            'action' => $this->generateUrl('declaracion_create'),
            'method' => 'POST',
        ));
        
        
            $form->add('submit', 'submit', array(
                'label' => 'Enviar',
                'attr' => array('class' => 'btn btn-success')
                ));

        return $form;
    }

    /**
     * Displays a form to create a new Declaracion entity.
     *
     * @Route("/new", name="declaracion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Declaracion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Declaracion entity.
     *
     * @Route("/{id}", name="declaracion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Declaracion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Declaracion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Declaracion entity.
     *
     * @Route("/{id}/edit", name="declaracion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Declaracion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Declaracion entity.');
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
    * Creates a form to edit a Declaracion entity.
    *
    * @param Declaracion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Declaracion $entity)
    {
        $form = $this->createForm(new DeclaracionType(), $entity, array(
            'action' => $this->generateUrl('declaracion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Declaracion entity.
     *
     * @Route("/{id}", name="declaracion_update")
     * @Method("PUT")
     * @Template("IDPCContractualBundle:Declaracion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Declaracion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Declaracion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('declaracion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Declaracion entity.
     *
     * @Route("/{id}", name="declaracion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCContractualBundle:Declaracion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Declaracion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pago_show', array('id' => $request->getSession()->get('pagoId'))));
    }

    /**
     * Creates a form to delete a Declaracion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('declaracion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'label' => 'Eliminar',
                'attr' => array('class' => 'btn btn-danger')
                ))
            ->getForm()
        ;
    }
    
         /**
     * Finds and displays a Informe entity.
     *
     * @Route("/{id}/showbypago", name="declaracion_showByPago")
     * @Method("GET")
     * @Template()
     */
    public function showByPagoAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Declaracion')->findOneBy(Array('pago' => $id));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Informe entity.');
        }

        $deleteForm = $this->createDeleteForm($entity->getId());

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }
}
