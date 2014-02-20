<?php

namespace Security\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SecuritySecurityBundle:Default:index.html.twig');
    }
}
