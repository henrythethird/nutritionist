<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Ingredient\Ingredient;
use AppBundle\Entity\Ingredient\Recipe;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IngredientController extends BaseDavController
{
    /**
     * @Route("/ingredient/show/{id}", name="ingredient_show")
     * @Template("ingredient/show.html.twig")
     */
    public function showAction(Ingredient $ingredient)
    {
        if ($ingredient instanceof Recipe) {
            return $this->redirectToRoute("recipe_show", [
                'id' => $ingredient->getId()
            ]);
        }

        return [
            'dav' => $this->getDav(),
            'ingredient' => $ingredient
        ];
    }

    /**
     * @Route("/recipe/show/{id}", name="recipe_show")
     * @Template("ingredient/recipe.html.twig")
     */
    public function recipeAction(Recipe $recipe)
    {
        return [
            'dav' => $this->getDav(),
            'recipe' => $recipe
        ];
    }
}