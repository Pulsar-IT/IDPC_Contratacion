<?php

namespace IDPC\ContractualBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\ContractualBundle\Entity\Certificacion;
use IDPC\ContractualBundle\Form\CertificacionType;

/**
 * Certificacion controller.
 *
 * @Route("/aportes/certificacion")
 */
class CertificacionController extends Controller
{
     /**
     *
     * @Route("/", name="certificacion_create")
     * @Method("POST")
     * @Template("IDPCContractualBundle:certificacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Certificacion();
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
    * @param Certificacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Certificacion $entity)
    {
        $form = $this->createForm(new CertificacionType(), $entity, array(
            'action' => $this->generateUrl('certificacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
   
    
     /**
     * @Route("/new", name="certificacion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        
        $entity = new Certificacion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
}