<?php

namespace Gcmaz\CmsBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
 
use Knp\Menu\ItemInterface as MenuItemInterface;
 
use Gcmaz\CmsBundle\Entity\Realtor;
 
//In order to use service for prePersist and preUpdate
use Symfony\Component\DependencyInjection\ContainerInterface;

class RealtorAdmin extends Admin
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
                ->add('address')
                ->add('description')
                ->add('listDate')
                ->add('active', null, array('required' => false))
            ->with('Media')
                ->add('picture', 'sonata_type_model_list', array('required' => true), array(
                    'link_parameters' => array(
                        'context' => 'realtor',
                        'provider'=>'sonata.media.provider.image'
                )))
            ->end()
            ->setHelps(array(
                'content' => 'Enter realtor listings'
            ))
            ->end()
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('active', null, array(
                'editable' => true,
                'template' => 'GcmazCmsBundle:Realtor:active.html.twig'
                ))
            ->addIdentifier('address')
            ->add('author', null, array('label' => 'Author'))
            ->add('listDate', null, array('label' => 'List Start Date'))
            ->add('picture', null, array(
                'label' => 'Image',
                'template' => 'GcmazCmsBundle:Realtor:featuredimage.html.twig'
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
                ->add('active')
                ->add('address')
                ->add('author')
                ->add('listDate')
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
            ->with('Realtor')
                ->add('address')
                ->add('description')
                ->add('author', null, array('label' => 'By :'))
                ->add('listDate')
                ->add('active')
            ->end()
            ->with('Media')
                ->add('picture', null, array('template' => 'GcmazCmsBundle:Realtor:featuredimage.html.twig'))
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
   public function prePersist($realtor)
   {
       $user = $this->container->get('security.context')->getToken()->getUser();
       $realtor->setAuthor($user);
   }
}
?>
