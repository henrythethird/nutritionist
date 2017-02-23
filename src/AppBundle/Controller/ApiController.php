<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredient\Recipe;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ApiController extends BaseDavController
{
    /**
     * @Route("/api/recipetable/{id}", name="api_recipe_table")
     * @Template("nutrition/info.html.twig")
     */
    public function recipeTableAction(Recipe $recipe)
    {
        return [
            'nutrition' => $recipe->getNutrition()->multiply(
                $recipe->getNumberOfServings() ? 1/$recipe->getNumberOfServings() : 1
            ),
            'dav' => $this->getDav()
        ];
    }
}