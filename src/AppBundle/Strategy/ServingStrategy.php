<?php

namespace AppBundle\Strategy;

use AppBundle\Entity\Ingredient\Recipe;
use AppBundle\Entity\Ingredient\RecipeIngredient;

class ServingStrategy implements StrategyInterface
{
    public function calculateMultiplier(RecipeIngredient $recipeIngredient)
    {
        /** @var Recipe $recipe */
        $recipe = $recipeIngredient->getIngredient();
        return $recipeIngredient->getMeasure()->getAmount() / $recipe->getNumberOfServings();
    }
}