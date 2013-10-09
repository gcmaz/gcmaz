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
                ->add('content', 'ckeditor', array(
                    'config_name' => 'cms_min'
                    ))
                ->add('concertDate', null, array(
                    'format' => 'MM-dd-yyyy',
                    'years' => array(2013, 2014),
                    'hours' => array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24, 'required' => false),
                    'minutes' => array(0,15,30,45, 'required'=> false),
                    // caused issues ... empty_value' => array('year' => 2013, 'hour' => 12, 'minute' => 00)
                    //'required' => false,
                ))
                ->add('link')
                ->add('published', null, array('required' => false, 'data' => true))
            ->with('Media')
                ->add('concertpicture', 'sonata_type_collection', array('required' => true), array(
                    'link_parameters' => array(
                        'context' => 'concerts',
                        'provider'=>'sonata.media.provider.image'
                )))
            ->end()
            ->with('Stations')
                ->add('showKAFF', 'checkbox', array('label' => 'Show on KAFF', 'required' => false))
                ->add('showKAFFAM', 'checkbox', array('label' => 'Show on KAFF AM', 'required' => false))
                ->add('showKMGN', 'checkbox', array('label' => 'Show on KMGN', 'required' => false))
                ->add('showKFSZ', 'checkbox', array('label' => 'Show on KFSZ', 'required' => false))
                ->add('showKTMG', 'checkbox', array('label' => 'Show on KTMG', 'required' => false))
                ->add('showKNOT', 'checkbox', array('label' => 'Show on KNOT', 'required' => false))
            ->end()
            ->setHelps(array(
                'concertDate' => '(Hours and Minutes NOT Required and wont display anyways)',
                'link' => '(If used,  INCLUDE the http://    This will display a generic link that says MORE INFO.  You can also add your own links in the Content above.)',
                'published' => '(Published = visible.  Uncheck if you just want it to be a draft for now, and publish later)',
                'picture' => '(You can upload a new photo or select one already in the list.  It will resize to 150px wide automatically.  Uploading LARGE photos may cause problems.)',
                'showKNOT' => '(Select the stations to show the concert listings)',
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
            //->add('link', null, array('label' => 'Link'))
            ->add('picture', null, array(
                'label' => 'Image',
                'template' => 'GcmazCmsBundle:Concert:featuredimage.html.twig'
                ))
            ->add('showKAFF', null, array('editable' => true, 'label' => 'KAFF', 'template' => 'GcmazCmsBundle:Concert:published.html.twig'))
            ->add('showKAFFAM', null, array('editable' => true, 'label' => 'KAFFAM', 'template' => 'GcmazCmsBundle:Concert:published.html.twig'))
            ->add('showKMGN', null, array('editable' => true, 'label' => 'KMGN', 'template' => 'GcmazCmsBundle:Concert:published.html.twig'))
            ->add('showKFSZ', null, array('editable' => true, 'label' => 'KFSZ', 'template' => 'GcmazCmsBundle:Concert:published.html.twig'))
            ->add('showKTMG', null, array('editable' => true, 'label' => 'KTMG', 'template' => 'GcmazCmsBundle:Concert:published.html.twig'))
            ->add('showKNOT', null, array('editable' => true, 'label' => 'KNOT', 'template' => 'GcmazCmsBundle:Concert:published.html.twig'))
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
                //->add('id')
                ->add('published')
                ->add('title')
                //->add('link')
                ->add('author')
                //->add('concertDate')
                ->add('showKAFF')
                ->add('showKAFFAM')
                ->add('showKMGN')
                ->add('showKFSZ')
                ->add('showKTMG')
                ->add('showKNOT')
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
            ->with('Stations')
                ->add('showKAFF')
                ->add('showKAFFAM')
                ->add('showKMGN')
                ->add('showKFSZ')
                ->add('showKTMG')
                ->add('showKNOT')
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
       $concert->setConcertpicture($concert->getConcertpicture());
   }
    public function preUpdate($concert) {
        $concert->setConcertpicture($concert->getConcertpicture());
    }
}
?>
