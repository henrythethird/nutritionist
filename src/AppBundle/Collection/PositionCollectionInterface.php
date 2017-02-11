<?php

namespace AppBundle\Collection;


use AppBundle\Entity\Nutrition\NutritionEmbeddable;

interface PositionCollectionInterface
{
    /**
     * @return PositionInterface[]
     */
    public function getPositions();

    public function setNutrition(NutritionEmbeddable $nutrition);
}