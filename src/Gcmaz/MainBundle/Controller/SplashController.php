<?php

namespace Gcmaz\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gcmaz\CmsBundle\Entity\Photocontest;


class SplashController extends Controller
{
    public function splashAction($splash)
    {
        switch($splash){
            // DEFAULT - COULD RETURN LIST OF SPLASH PAGES
            case 'default' :
                return $this->render('GcmazMainBundle:Splash:default.html.twig', array(
                    'splash' => $splash
                ));
                        
            //  PATS RUN 
            case 'pats-run-shadow-run-flagstaff' :
                return $this->render('GcmazMainBundle:Splash:patsrun.html.twig', array(
                    'splash' => $splash
                ));
                
                //  TEACHERS APP NIGHT  
            case 'teachers-appreciation-night' :
                return $this->render('GcmazMainBundle:Splash:teachersnight.html.twig', array(
                    'splash' => $splash
                ));
                
            //  RENAISSANCE FAIRE TIX
            case 'arizona-renaissance-faire' :
                return $this->render('GcmazMainBundle:Splash:renaissancefaire.html.twig', array(
                    'splash' => $splash
                ));             
        }
    }
     
    // were using the Photocontest CMS for quick solution to rush project to enter Dogs for adopt a dog month
    public function adoptAction(){
        $entities = $this->getDogDetails();
        return $this->render('GcmazMainBundle:Splash:coconinohumane.html.twig', array(
            'entities' => $entities,
        ));
    }
  
    private function getDogRepository() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('GcmazCmsBundle:Photocontest');
        if(!$entities){
            //throw $this->createNotFoundException('Unable to gather data');
            $entities = '';
        }
        return  $entities;
    }
    
    private function getDogDetails() {
        $entities = $this->getDogRepository()->getPhotocontest();
            if(!$entities){
                //throw $this->createNotFoundException('Unable to find any concert data');
                $entities = '';
            }
        return $entities;
    }
}
?>