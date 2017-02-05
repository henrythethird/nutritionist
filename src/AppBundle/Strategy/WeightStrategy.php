<?php

namespace AppBundle\Strategy;


use AppBundle\Entity\Ingredient\RecipeIngredient;

class WeightStrategy implements StrategyInterface
{
    public function calculateMultiplier(RecipeIngredient $recipeIngredient)
    {
        $measure = $recipeIngredient->getMeasure();
        return $measure->getAmount() * $measure->getUnit()->getBaseRatio();
    }
}