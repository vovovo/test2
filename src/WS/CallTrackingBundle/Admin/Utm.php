<?php

namespace WS\CallTrackingBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class Utm extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('utm_string')
            ->add('description');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('utm_string')
            ->add('description');
    }


    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('utm_string')
            ->add('description');
    }
}

?>