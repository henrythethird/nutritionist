<?php

namespace AppBundle\Collection;


use AppBundle\Entity\Ingredient\Ingredient;
use AppBundle\Entity\Measure;

interface PositionInterface
{
    /**
     * @return Ingredient
     */
    public function getIngredient();

    /**
     * @return Measure
     */
    public function getMeasure();

    /**
     * @return PositionCollectionInterface
     */
    public function getParent();
}