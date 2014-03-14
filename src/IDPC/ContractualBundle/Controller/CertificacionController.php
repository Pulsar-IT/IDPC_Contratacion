<?php
namespace IDPC\ContractualBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IDPC\ContractualBundle\Entity\Certificacion;
use IDPC\ContractualBundle\Form\CertificacionType;
use IDPC\ContractualBundle\Form\CertificacionpdfType;

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
        $em = $this->getDoctrine()->getManager();
        $pago = $em->getRepository('IDPCContractualBundle:Pago')->find($request->getSession()->get('pagoId'));
        $entity = new Certificacion();
        $entity->setPago($pago);
        $entity->setPath('nada');
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);  
        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('certificacion_pdf', array('id' => $request->getSession()->get('pagoId'))));
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

        $form->add('submit', 'submit', array('label' => 'Acepto'));

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
    
    
     /**
     * @Route("/pdf/{id}", name="certificacion_pdf")
     * @Method("GET")
     * @Template("IDPCContractualBundle:certificacion:pdf.html.twig")
     */
    public function pdfAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $pago = $em->getRepository('IDPCContractualBundle:Pago')->find($id);
        $aportes = $em->getRepository('IDPCContractualBundle:Aportes')->findBy(array('pago' => $pago ));
        $total = 0;
        foreach ($aportes as $aporte){
         $total = $total + $aporte->getLimite();   
         }
        $pago->setValorAportes($total);
        $em->persist($pago);
        $em->flush();
        return array(
            'pago' => $pago,
            'total' => $total,
        );
    }
    
     /**
     * @Route("/subir/{id}", name="certificacion_subirform")
     * @Method("GET")
     * @Template("IDPCContractualBundle:certificacion:subir.html.twig")
     */
    public function subirformAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $pago = $em->getRepository('IDPCContractualBundle:Pago')->find($id);
        $certifica = $em->getRepository('IDPCContractualBundle:Certificacion')->findOneBy(array ('pago' => $pago));
        $form = $this->createCreatepdfForm($certifica);
        return array(
            'certificado' => $certifica,
            'form'   => $form->createView(),
        );
    }
    
    
    
         /**
     *
     * @Route("/subirpdf", name="certificacion_subir")
     * @Method("POST")
     * @Template("IDPCContractualBundle:certificacion:subir.html.twig")
     */
    public function subirAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pago = $em->getRepository('IDPCContractualBundle:Pago')->find($request->getSession()->get('pagoId'));
 
        $certifica = $em->getRepository('IDPCContractualBundle:Certificacion')->findOneBy(array ('pago' => $pago));
        //$certifica = new Certificacion();
        $certifica->setPath(NULL);
        $form = $this->createCreatepdfForm($certifica);
        $form->handleRequest($request);
        
        if ($form->isValid()) {

            $em->persist($certifica);
            $em->flush();

            return $this->redirect($this->generateUrl('certificacion_pdf', array('id' => $request->getSession()->get('pagoId'))));
        }

        return array(
            'certificado' => $certifica,
            'form'   => $form->createView(),
        );
    }
    
    
            /**
    * @param Certificacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreatepdfForm(Certificacion $entity)
    {
        $form = $this->createForm(new CertificacionpdfType(), $entity, array(
            'action' => $this->generateUrl('certificacion_subir'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Subir'));

        return $form;
    }
    
    
}
