<?php

namespace Gcmaz\CmsBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\MediaBundle\Admin\GalleryHasMediaAdmin as BaseAdmin;

//In order to use service for prePersist and preUpdate
use Symfony\Component\DependencyInjection\ContainerInterface;

class ConcertPictureAdmin extends BaseAdmin
{
    
 /**
     * Create and Edit
     * @param FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('picture', 'sonata_type_model', array('required' => false,), array('link_parameters' => array('provider' => 'sonata.media.provider.image', 'context' => 'concert')))
        ;
    }

   //the prePersist
   public function prePersist($concert)
   {
       $user = $this->container->get('security.context')->getToken()->getUser();
       $concert->setAuthor($user);
       $concert->setConcertpicture($concert->getConcertpicture());
   }
    public function preUpdate($concert) {
        $concert->setConcertpicture($concert->getConcertpicture());
    }
}
?>
