<?php

namespace Gcmaz\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SendLinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email', 'email');
        $builder->add('phone');
        $builder->add('where');
        $builder->add('link');
    }

    public function getName()
    {
        return 'sendlinkcontact';
    }
}

?>