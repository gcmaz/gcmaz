<?php

namespace Gcmaz\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('GcmazMainBundle:Page:index.html.twig');
    }
    
    public function fbgcmazAction()
    {
        return $this->render('GcmazMainBundle:Page:fbgcmaztest.html.twig');
        
    }
}
