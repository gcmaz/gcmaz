<?php

namespace Gcmaz\CmsBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
 
use Knp\Menu\ItemInterface as MenuItemInterface;
 
use Gcmaz\CmsBundle\Entity\Pet;
 
//In order to use service for prePersist and preUpdate
use Symfony\Component\DependencyInjection\ContainerInterface;

class PetAdmin extends Admin
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
                ->add('name')
                ->add('description', 'ckeditor', array(
                    'config_name' => 'cms_pet'
                    ))
            ->with('Media')
                ->add('picture', 'sonata_type_model_list', array(
                    'required' => true,
                    'label' => 'Photo',
                    ),
                    array(
                        'link_parameters' => array(
                            'context' => 'pet',
                            'provider'=>'sonata.media.provider.image'
                        ),
                    )
                )
            ->end()
            ->setHelps(array(
                'content' => 'Enter a new Pet of the Week'
            ))
            ->end()
        ;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name')
            ->add('author', null, array('label' => 'Author'))
            ->add('picture', null, array(
                'label' => 'Photo'
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
                ->add('name')
                ->add('author')
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
            ->with('Pet')
                ->add('name')
                ->add('description')
                ->add('author', null, array('label' => 'Posted By'))
            ->end()
            ->with('Media')
                ->add('picture', null, array('label' => 'Photo'))
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
   public function prePersist($pet)
   {
       $user = $this->container->get('security.context')->getToken()->getUser();
       $pet->setAuthor($user);
   }
}
?>
