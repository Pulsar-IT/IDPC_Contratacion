<?php

namespace Meissen\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MeissenSecurityBundle:Default:index.html.twig');
    }
}
