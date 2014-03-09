<?php

namespace IDPC\ContractualBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\ContractualBundle\Entity\Informe;
use IDPC\ContractualBundle\Form\InformeType;

/**
 * Informe controller.
 *
 * @Route("/informe")
 */
class InformeController extends Controller
{

    /**
     * Lists all Informe entities.
     *
     * @Route("/", name="informe")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCContractualBundle:Informe')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Informe entity.
     *
     * @Route("/", name="informe_create")
     * @Method("POST")
     * @Template("IDPCContractualBundle:Informe:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Informe();
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
    * Creates a form to create a Informe entity.
    *
    * @param Informe $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Informe $entity)
    {
        $form = $this->createForm(new InformeType(), $entity, array(
            'action' => $this->generateUrl('informe_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Informe entity.
     *
     * @Route("/new", name="informe_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction( )
    {
        $entity = new Informe();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Informe entity.
     *
     * @Route("/{id}", name="informe_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Informe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Informe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Informe entity.
     *
     * @Route("/{id}/edit", name="informe_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Informe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Informe entity.');
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
    * Creates a form to edit a Informe entity.
    *
    * @param Informe $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Informe $entity)
    {
        $form = $this->createForm(new InformeType(), $entity, array(
            'action' => $this->generateUrl('informe_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Informe entity.
     *
     * @Route("/{id}", name="informe_update")
     * @Method("PUT")
     * @Template("IDPCContractualBundle:Informe:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Informe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Informe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('informe_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Informe entity.
     *
     * @Route("/{id}", name="informe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCContractualBundle:Informe')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Informe entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pago'));
    }

    /**
     * Creates a form to delete a Informe entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('informe_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'label' => 'Eliminar',
                'attr' => array('class' => 'btn btn-danger btn-mini')
                ))
            ->getForm()
        ;
    }
    
     /**
     * Finds and displays a Informe entity.
     *
     * @Route("/{id}/showbypago", name="informe_showByPago")
     * @Method("GET")
     * @Template()
     */
    public function showByPagoAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Informe')->findOneBy(Array('pago' => $id));

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
