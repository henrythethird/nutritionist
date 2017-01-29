<?php

namespace AppBundle\Entity\Ingredient;

use AppBundle\Entity\Embeddable\MeasureEmbeddable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class RecipeIngredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingredient\Recipe", inversedBy="recipeIngredients")
     */
    private $recipe;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingredient\Ingredient", inversedBy="ingredientRecipes")
     */
    private $ingredient;

    /**
     * @ORM\Embedded(class="AppBundle\Entity\Embeddable\MeasureEmbeddable")
     */
    private $measure;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Recipe
     */
    public function getRecipe()
    {
        return $this->recipe;
    }

    /**
     * @param Recipe $recipe
     */
    public function setRecipe(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * @return Ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * @param Ingredient $ingredient
     */
    public function setIngredient(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    /**
     * @return MeasureEmbeddable
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * @param MeasureEmbeddable $measure
     */
    public function setMeasure($measure)
    {
        $this->measure = $measure;
    }
}