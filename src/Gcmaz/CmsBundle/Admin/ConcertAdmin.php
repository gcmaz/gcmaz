<?php

namespace Gcmaz\CmsBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
 
use Knp\Menu\ItemInterface as MenuItemInterface;
 
use Gcmaz\CmsBundle\Entity\Concert;
 
//In order to use service for prePersist and preUpdate
use Symfony\Component\DependencyInjection\ContainerInterface;

class ConcertAdmin extends Admin
{
    
 /**
     * Create and Edit
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('title')
                ->add('content')
                ->add('concertDate')
                ->add('link')
                ->add('published', null, array('required' => false))
            ->with('Media')
                ->add('picture', 'sonata_type_model_list', array('required' => true), array(
                    'link_parameters' => array(
                        'context' => 'concerts',
                        'provider'=>'sonata.media.provider.image'
                )))
            ->end()
            ->with('Stations')
                ->add('kaff', 'checkbox')
            ->end()
            ->setHelps(array(
                'content' => 'Enter concert details'
            ))
            ->end()
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('published', null, array(
                'editable' => true,
                'template' => 'GcmazCmsBundle:Concert:published.html.twig'
                ))
            ->addIdentifier('title')
            ->add('author', null, array('label' => 'Author'))
            ->add('concertDate', null, array('label' => 'Concert Date'))
            ->add('link', null, array('label' => 'Link'))
            ->add('picture', null, array(
                'label' => 'Image',
                'template' => 'GcmazCmsBundle:Concert:featuredimage.html.twig'
                ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
    
     /**
     * Filters
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('id')
                ->add('published')
                ->add('title')
                ->add('link')
                ->add('author')
                ->add('concertDate')
        ;
    }

    /**
     * Show
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
                ->add('id')
            ->with('Concert')
                ->add('title')
                ->add('content')
                ->add('link')
                ->add('author', null, array('label' => 'By :'))
                ->add('concertDate')
                ->add('published')
            ->end()
            ->with('Media')
                ->add('picture', null, array('template' => 'GcmazCmsBundle:Concert:featuredimage.html.twig'))
            ->end()
        ;
    }
    
    // constructor to access security container
    public function __construct($code, $class, $baseControllerName, ContainerInterface $container)
       {
           parent::__construct($code, $class, $baseControllerName);
           $this->container = $container;
       }
   //the prePersist
   public function prePersist($concert)
   {
       $user = $this->container->get('security.context')->getToken()->getUser();
       $concert->setAuthor($user);
   }
}
?>
