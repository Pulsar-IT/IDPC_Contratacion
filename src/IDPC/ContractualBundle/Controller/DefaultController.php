<?php

namespace IDPC\ContractualBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IDPCContractualBundle:Default:index.html.twig', array('name' => $name));
    }
}
