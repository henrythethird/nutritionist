<?php

namespace AppBundle\Service;


use AppBundle\Collection\PositionCollectionInterface;
use AppBundle\Entity\Ingredient\Ingredient;
use AppBundle\Entity\Nutrition\NutritionEmbeddable;

class SummarizeService
{
    /**
     * @param Ingredient[] $ingredients
     * @return NutritionEmbeddable
     */
    public function summarize($ingredients)
    {
        $summarized = new NutritionEmbeddable();

        foreach ($ingredients as $ingredient) {
            $summarized->add($ingredient->getNutrition());
        }

        return $summarized;
    }

    public function recalculateRecipeNutrition(PositionCollectionInterface $positionCollection)
    {
        $summarized = new NutritionEmbeddable();

        foreach ($positionCollection->getPositions() as $position) {
            $strategy = $position->getIngredient()->getStrategy();

            $multiplier = $strategy->calculateMultiplier($position);

            $nutrition = clone $position->getIngredient()->getNutrition();
            $nutrition->multiply($multiplier);
            $summarized->add($nutrition);
        }

        $positionCollection->setNutrition($summarized);
    }
}