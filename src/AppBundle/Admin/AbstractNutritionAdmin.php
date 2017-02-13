<?php

namespace AppBundle\Admin;

use AppBundle\Collection\PositionCollectionInterface;
use AppBundle\Entity\Ingredient\Recipe;
use AppBundle\Entity\Ingredient\WeightIngredient;
use AppBundle\Entity\Unit\VolumeUnit;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

abstract class AbstractNutritionAdmin extends AbstractAdmin
{
    private static $fieldMapping = [
        'calories',
        'water',
        'alcohol',
        'carbs',
        'protein',
        'fat',
    ];

    /**
     * @param ErrorElement $errorElement
     * @param PositionCollectionInterface $recipe
     */
    public function validate(ErrorElement $errorElement, $recipe)
    {
        foreach ($recipe->getPositions() as $position) {
            if ($position->getIngredient() instanceof Recipe &&
                $position->getMeasure()->getUnit())
            {
                $errorElement->addViolation("Recipe can't have a Unit");
            }
            if ($position->getIngredient() instanceof WeightIngredient &&
                $position->getMeasure()->getUnit() instanceof VolumeUnit)
            {
                $errorElement->addViolation("Weight ingredients can't have a volume unit");
            }
        }
    }

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