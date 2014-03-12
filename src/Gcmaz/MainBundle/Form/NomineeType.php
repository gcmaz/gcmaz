<?php

namespace Gcmaz\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NomineeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nominee');
        $builder->add('why', 'textarea');
        $builder->add('name');
        $builder->add('email', 'email');
        $builder->add('phone');
        $builder->add('where', 'choice', array(
            'choices' => array(
                'Flagstaff' => 'Flagstaff',
                'Prescott' => 'Prescott',
            ),
            'label' => 'Location',
            'required' => true,
            'empty_value' => 'Select closest city',
            'empty_data' => null
        ));
        $builder->add('kaff', 'checkbox', array(
            'label' => '92.9 KAFF',
            'value' => 'yes',
            'required' => false,
        ));
        $builder->add('kfsz', 'checkbox', array(
            'label' => 'Hits 106',
            'value' => 'yes',
            'required' => false,
        ));
        $builder->add('ktmg', 'checkbox', array(
            'label' => 'Magic 99.1',
            'value' => 'yes',
            'required' => false,
        ));
        $builder->add('knot', 'checkbox', array(
            'label' => 'Fun Oldies',
            'value' => 'yes',
            'required' => false,
        ));
    }

    public function getName()
    {
        return 'nomineeinfo';
    }
}

?>