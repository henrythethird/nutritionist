<?php

namespace AppBundle\Collection;


use AppBundle\Entity\Embeddable\BaseNutritionEmbeddable;

interface PositionCollectionInterface
{
    /**
     * @return PositionInterface[]
     */
    public function getPositions();

    public function setNutrition(BaseNutritionEmbeddable $nutrition);
}