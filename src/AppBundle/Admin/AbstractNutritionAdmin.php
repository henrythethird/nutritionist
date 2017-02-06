<?php

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

abstract class AbstractNutritionAdmin extends AbstractAdmin
{
    private static $fieldMapping = [
        'carbs',
        'starch',
        'protein',
        'fat',
        'calories'
    ];

    protected function addNutrition(FormMapper $formMapper, $editable = false, $prefix = "nutrition")
    {
        foreach (self::$fieldMapping as $field) {
            $this->addField($formMapper, "$prefix.$field", $editable);
        }
    }

    private function addField(FormMapper $formMapper, $field, $editable)
    {
        $formMapper->add(
            $field,
            NumberType::class,
            $editable ? [] : [
                'disabled' => true
            ]
        );
    }
}