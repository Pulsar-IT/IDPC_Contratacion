<?php

namespace IDPC\ContractualBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\ContractualBundle\Entity\Aportes;
use IDPC\ContractualBundle\Form\AportesType;
use IDPC\ContractualBundle\Form\SaludType;

/**
 * Aportes controller.
 *
 * @Route("/aportes")
 */
class AportesController extends Controller
{

    /**
     * Lists all Aportes entities.
     *
     * @Route("/", name="aportes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IDPCContractualBundle:Aportes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
     /**
     * Lists all Aportes entities.
     *
     * @Route("/gen/{id}", name="aportes_generar")
     * @Method("GET")
     * @Template("IDPCContractualBundle:Aportes:index.html.twig")
     */
    
    public function generaAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $pago = $em->getRepository('IDPCContractualBundle:Pago')->findOneBy(array('id' => $id));
        $aportes = $em->getRepository('IDPCContractualBundle:Aportes')->findBy(array('pago' => $pago));
        $total = count($aportes);
        
        if ($total == 0){    
        $salud = new Aportes();
        $salud->setLimite($pago->getValor()*0.40*0.125);
        $salud->setTipo('Salud');
        $salud->setReferencia('-');
        $salud->setValor(0);
        $salud->setPago($pago);
        $em->persist($salud);
        $em->flush();
        
        $pension = new Aportes();
        $pension->setLimite($pago->getValor()*0.40*0.16);
        $pension->setTipo('Pensión');
        $pension->setReferencia('-');
        $pension->setValor(0);
        $pension->setPago($pago);
        $em->persist($pension);
        $em->flush();
        
        $arl = new Aportes();
        $arl->setLimite($pago->getValor()*0.40*0.00522);
        $arl->setTipo('ARL');
        $arl->setReferencia('-');
        $arl->setValor(0);
        $arl->setPago($pago);
        $em->persist($arl);
        $em->flush();
        
        $pago = $em->getRepository('IDPCContractualBundle:Pago')->findOneBy(array('id' => $id));
        $aportes = $em->getRepository('IDPCContractualBundle:Aportes')->findBy(array('pago' => $pago));
        
        }
        
        return array(
            'entities' => $aportes,
            'pago' => $pago,
        );
    }
    
    
    /**
     * Creates a new Aportes entity.
     *
     * @Route("/", name="aportes_create")
     * @Method("POST")
     * @Template("IDPCContractualBundle:Aportes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Aportes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('aportes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Aportes entity.
    *
    * @param Aportes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Aportes $entity)
    {
        $form = $this->createForm(new AportesType(), $entity, array(
            'action' => $this->generateUrl('aportes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Aportes entity.
     *
     * @Route("/new", name="aportes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Aportes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Aportes entity.
     *
     * @Route("/{id}", name="aportes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Aportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Aportes entity.
     *
     * @Route("/{id}/edit", name="aportes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Aportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aportes entity.');
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
     * Displays a form to edit an existing Aportes entity.
     *
     * @Route("/{id}/salud", name="aportes_salud")
     * @Method("GET")
     * @Template()
     */
    public function saludAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Aportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aportes entity.');
        }

        $saludForm = $this->createSaludForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $saludForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Aportes entity.
    *
    * @param Aportes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Aportes $entity)
    {
        $form = $this->createForm(new AportesType(), $entity, array(
            'action' => $this->generateUrl('aportes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    /**
    * crea formulario para salud
    *
    * @param Aportes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createSaludForm(Aportes $entity)
    {
        $form = $this->createForm(new SaludType(), $entity, array(
            'action' => $this->generateUrl('aportes_updatesalud', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Registrar'));

        return $form;
    }
    
    /**
     * Edits an existing Aportes entity.
     *
     * @Route("/{id}", name="aportes_update")
     * @Method("PUT")
     * @Template("IDPCContractualBundle:Aportes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Aportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('aportes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
        /**
     * Edits an existing Aportes entity.
     *
     * @Route("/update/{id}", name="aportes_updatesalud")
     * @Method("PUT")
     * @Template("IDPCContractualBundle:Aportes:salud.html.twig")
     */
    public function updateSaludAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IDPCContractualBundle:Aportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aportes entity.');
        }

        $editForm = $this->createSaludForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('pago'));
        }
          return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
        }
    
    /**
     * Deletes a Aportes entity.
     *
     * @Route("/{id}", name="aportes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IDPCContractualBundle:Aportes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Aportes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('aportes'));
    }

    /**
     * Creates a form to delete a Aportes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aportes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
