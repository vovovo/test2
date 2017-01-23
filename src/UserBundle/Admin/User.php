<?php

namespace UserBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class User extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('General')
            ->add('username')
            ->add('roles', 'choice', array(
                'choices' => array(
                    'ROLE_CLIENT'  => 'ROLE_CLIENT',
                    'SUPER_ADMIN'=>'ROLE_SUPER_ADMIN'
                ),
                'expanded' => false,
                'multiple' => true,
                'required' => false
            ))
            ->add('email')
            ->add('api_key')
            ->add('plainPassword', 'text', array('label' => 'Password', 'required' => false))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('username')->add('email');
    }



    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('username')->add('email');
    }
}

?>