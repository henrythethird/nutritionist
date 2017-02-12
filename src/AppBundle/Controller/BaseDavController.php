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
        $dav = new NutritionEmbeddable();
        return $dav->fromArray($this->getParameter('dav'));
    }
}