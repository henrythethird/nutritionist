<?php

namespace AppBundle\Entity\Ingredient;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "volume" = "VolumeIngredient",
 *     "weight" = "WeightIngredient",
 *     "recipe" = "Recipe"
 * })
 */
abstract class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ingredient\RecipeIngredient", mappedBy="ingredient")
     */
    protected $ingredientRecipes;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Day\DayPosition", mappedBy="ingredient")
     */
    protected $dayPositions;

    public function __construct()
    {
        $this->ingredientRecipes = new ArrayCollection();
        $this->dayPositions = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return RecipeIngredient[]|ArrayCollection
     */
    public function getIngredientRecipes()
    {
        return $this->ingredientRecipes;
    }

    /**
     * @param RecipeIngredient[]|ArrayCollection $ingredientRecipes
     */
    public function setIngredientRecipes($ingredientRecipes)
    {
        $this->ingredientRecipes = $ingredientRecipes;
    }

    public function addIngredientRecipe(RecipeIngredient $recipeIngredient)
    {
        $recipeIngredient->setIngredient($this);
        $this->ingredientRecipes->add($recipeIngredient);
    }

    public function removeIngredientRecipe(RecipeIngredient $recipeIngredient)
    {
        $this->ingredientRecipes->removeElement($recipeIngredient);
    }

    public function __toString()
    {
        return $this->getName();
    }
}