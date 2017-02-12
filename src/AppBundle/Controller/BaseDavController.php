<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Nutrition\NutritionEmbeddable;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseDavController extends Controller
{
    /**
     * @return NutritionEmbeddable
     */
    protected function getDav()
    {
        return (new NutritionEmbeddable())
            ->fromArray($this->getParameter('dav'));
    }

    /**
     * @return NutritionEmbeddable
     */
    protected function getDavWeek()
    {
        return $this->getDav()
            ->multiply(7);
    }
}