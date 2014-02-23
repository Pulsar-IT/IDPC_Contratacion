<?php

namespace IDPC\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IDPCBaseBundle:Default:index.html.twig', array('name' => $name));
    }
}
