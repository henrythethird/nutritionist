<?php

namespace AppBundle\Entity\Ingredient;

use AppBundle\Entity\Measure;
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Measure", cascade={"persist", "remove"})
     */
    private $measure;

    public function __construct()
    {
        $this->measure = new Measure();
    }

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

    public function setIngredient(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    /**
     * @return Measure
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    public function setMeasure(Measure $measure)
    {
        $this->measure = $measure;
    }
}