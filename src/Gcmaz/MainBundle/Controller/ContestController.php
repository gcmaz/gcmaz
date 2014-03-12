<?php

namespace Gcmaz\MainBundle\Controller;

use Gcmaz\MainBundle\Entity\SendLink;
use Gcmaz\MainBundle\Form\SendLinkType;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContestController extends Controller
{
    public function contestAction($contest, $id)
    {
        switch($contest){
            // COULD RETURN LIST OF PAGES
            case 'default' :
                return $this->render('GcmazMainBundle:Contest:default.html.twig', array(
                    'contest' => $contest
                ));
                
            // NOM-A-MOM
            case 'nom-a-mom' :
                $sendlink = new SendLink();
                $form = $this->createForm(new SendLinkType(), $sendlink);

                $request = $this->getRequest();
                if ($request->getMethod() == 'POST') {
                    $form->bind($request);

                    if ($form->isValid()) {
                        //send
                        $message = Swift_Message::newInstance()
                            ->setSubject('Trick Shot Video Entry')
                            ->setFrom($sendlink->getEmail())
                            ->setReplyTo($sendlink->getEmail())
                            ->setTo($this->container->getParameter('gcm.emails.contests'))
                            ->setBody($this->renderView('GcmazMainBundle:Email:nomamom.txt.twig', array('sendlink' => $sendlink)));
                        $this->get('mailer')->send($message);

                        $this->get('session')->getFlashBag()->add('nomamomnotice', 'Your entry is submitted.  Thank you for entering!!');

                        //redirect - important to prevent repost from page refresh
                        return $this->redirect($this->generateUrl('gcm_contest', array('contest'=>'nom-a-mom')));
                        }
                }
                return $this->render('GcmazMainBundle:Contest:nomamom.html.twig', array(
                    'form' => $form->createView(),
                    'contest' => $contest,
                    'id' => $id,
                ));
                
            // GLOBE TROTTERS
            case 'trick-shot' :
                $sendlink = new SendLink();
                $form = $this->createForm(new SendLinkType(), $sendlink);

                $request = $this->getRequest();
                if ($request->getMethod() == 'POST') {
                    $form->bind($request);

                    if ($form->isValid()) {
                        //send
                        $message = Swift_Message::newInstance()
                            ->setSubject('Trick Shot Video Entry')
                            ->setFrom($sendlink->getEmail())
                            ->setReplyTo($sendlink->getEmail())
                            ->setTo($this->container->getParameter('gcm.emails.contests'))
                            ->setBody($this->renderView('GcmazMainBundle:Email:trickshot.txt.twig', array('sendlink' => $sendlink)));
                        $this->get('mailer')->send($message);

                        $this->get('session')->getFlashBag()->add('sendlinknotice', 'Your video is submitted.  We will review and post it asap.  Thank you for entering!!');

                        //redirect - important to prevent repost from page refresh
                        return $this->redirect($this->generateUrl('gcm_contest', array('contest'=>'trick-shot')));
                        }
                }
                return $this->render('GcmazMainBundle:Contest:globetrotters.html.twig', array(
                    'form' => $form->createView(),
                    'contest' => $contest,
                    'id' => $id,
                ));
            // GLOBE TROTTERS ENTRIES    
            case 'trick-shot-entry' :
                return $this->render('GcmazMainBundle:Contest:globetrotters_entries.html.twig', array(
                    'contest' => $contest,
                    'id' => $id,
                ));
        }
    }
    
}
?>