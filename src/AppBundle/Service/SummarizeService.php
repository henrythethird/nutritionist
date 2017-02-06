<?php

namespace AppBundle\Service;


use AppBundle\Collection\PositionCollectionInterface;
use AppBundle\Entity\Embeddable\BaseNutritionEmbeddable;
use AppBundle\Entity\Ingredient\Ingredient;

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

    public function recalculateRecipeNutrition(PositionCollectionInterface $positionCollection)
    {
        $summarized = new BaseNutritionEmbeddable();

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