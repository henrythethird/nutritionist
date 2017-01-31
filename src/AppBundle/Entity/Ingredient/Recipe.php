<?php

namespace AppBundle\Entity\Ingredient;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Recipe extends Ingredient
{
    /**
     * @ORM\OneToMany(
     *     targetEntity="AppBundle\Entity\Ingredient\RecipeIngredient",
     *     mappedBy="recipe",
     *     cascade={"persist", "remove"},
     *     orphanRemoval=true
     * )
     */
    private $recipeIngredients;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfServings;

    public function __construct()
    {
        parent::__construct();
        $this->recipeIngredients = new ArrayCollection();
    }

    /**
     * @return RecipeIngredient[]|ArrayCollection
     */
    public function getRecipeIngredients()
    {
        return $this->recipeIngredients;
    }

    /**
     * @param RecipeIngredient[]|ArrayCollection $recipeIngredients
     */
    public function setRecipeIngredients($recipeIngredients)
    {
        $this->recipeIngredients = $recipeIngredients;
    }

    public function addRecipeIngredient(RecipeIngredient $recipeIngredient)
    {
        $recipeIngredient->setRecipe($this);
        $this->recipeIngredients->add($recipeIngredient);
    }

    public function removeRecipeIngredient(RecipeIngredient $recipeIngredient)
    {
        $this->recipeIngredients->removeElement($recipeIngredient);
    }

    /**
     * @return integer
     */
    public function getNumberOfServings()
    {
        return $this->numberOfServings;
    }

    /**
     * @param integer $numberOfServings
     */
    public function setNumberOfServings($numberOfServings)
    {
        $this->numberOfServings = $numberOfServings;
    }

    public function __toString()
    {
        return "R - ".$this->getName();
    }
}