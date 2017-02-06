<?php

namespace AppBundle\Strategy;

use AppBundle\Collection\PositionInterface;
use AppBundle\Entity\Ingredient\Recipe;

class ServingStrategy implements StrategyInterface
{
    public function calculateMultiplier(PositionInterface $position)
    {
        /** @var Recipe $recipe */
        $recipe = $position->getIngredient();
        return $position->getMeasure()->getAmount() / $recipe->getNumberOfServings();
    }
}