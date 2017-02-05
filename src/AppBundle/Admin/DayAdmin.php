<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class DayAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('date', 'sonata_type_datetime_picker', [
                'format' => 'dd.MM.yyyy',
                'attr' => [
                    'data-date-format' => 'DD.MM.YYYY',
                ],
            ])
            ->add('positions', 'sonata_type_collection', [
                'by_reference' => false
            ], [
                'edit' => 'inline',
                'inline' => 'table'
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('date');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('date')
        ;
    }
}