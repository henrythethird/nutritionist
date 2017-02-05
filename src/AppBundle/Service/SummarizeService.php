<?php

namespace AppBundle\Service;


use AppBundle\Entity\Embeddable\BaseNutritionEmbeddable;
use AppBundle\Entity\Ingredient\Ingredient;
use AppBundle\Entity\Ingredient\Recipe;

class SummarizeService
{
    /**
     * @param Ingredient[] $ingredients
     * @return BaseNutritionEmbeddable
     */
    public function summarize($ingredients)
    {
        $summarized = new BaseNutritionEmbeddable();

        foreach ($ingredients as $ingredient) {
            $summarized->add($ingredient->getNutrition());
        }

        return $summarized;
    }

    /**
     * @param Recipe $recipe
     */
    public function recalculateRecipeNutrition(Recipe $recipe)
    {
        $summarized = new BaseNutritionEmbeddable();

        foreach ($recipe->getRecipeIngredients() as $recipeIngredient) {
            $strategy = $recipeIngredient->getIngredient()->getStrategy();

            $multiplier = $strategy->calculateMultiplier($recipeIngredient->getMeasure());

            $nutrition = clone $recipeIngredient->getIngredient()->getNutrition();
            $nutrition->multiply($multiplier);
            $summarized->add($nutrition);
        }

        $recipe->setNutrition($summarized);
    }
}