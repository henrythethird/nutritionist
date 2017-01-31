<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class DayPositionAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('date', 'sonata_type_datetime_picker', [
                'required' => false,
                'format' => 'dd.MM.yyyy',
                'attr' => [
                    'data-date-format' => 'DD.MM.YYYY',
                ],
            ])
            ->add('type', null, [], [
                'allow_add' => true
            ])
            ->add('numberOfServings')
            ->add('ingredient')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('type');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('date')
            ->add('type')
            ->add('ingredient')
        ;
    }
}