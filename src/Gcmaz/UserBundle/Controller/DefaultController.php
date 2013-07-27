<?php

namespace Gcmaz\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GcmazUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
