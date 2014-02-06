<?php

namespace Gcmaz\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SplashController extends Controller
{
    public function splashAction($splash)
    {
        switch($splash){
            // COULD RETURN LIST OF SPLASH PAGES
            case 'default' :
                return $this->render('GcmazMainBundle:Splash:default.html.twig', array(
                    'splash' => $splash
                ));
                
            //  RENAISSANCE FAIRE TIX
            case 'arizona-renaissance-faire' :
                return $this->render('GcmazMainBundle:Splash:renaissancefaire.html.twig', array(
                    'splash' => $splash
                ));             
        }
    }  
}
?>