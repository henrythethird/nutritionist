<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Ingredient\Ingredient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IngredientController extends Controller
{
    /**
     * @Route("/ingredient/show/{id}", name="ingredient_show")
     * @Template(":ingredient:show.html.twig")
     */
    public function showAction(Ingredient $ingredient)
    {
        return [
            'ingredient' => $ingredient
        ];
    }
}