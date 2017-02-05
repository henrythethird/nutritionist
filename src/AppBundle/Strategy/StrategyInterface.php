<?php

namespace AppBundle\Strategy;

use AppBundle\Entity\Ingredient\RecipeIngredient;

interface StrategyInterface
{
    public function calculateMultiplier(RecipeIngredient $recipeIngredient);
}