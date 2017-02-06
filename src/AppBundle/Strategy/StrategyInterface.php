<?php

namespace AppBundle\Strategy;

use AppBundle\Collection\PositionInterface;

interface StrategyInterface
{
    public function calculateMultiplier(PositionInterface $recipeIngredient);
}