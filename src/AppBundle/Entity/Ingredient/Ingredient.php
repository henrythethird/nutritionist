<?php

namespace AppBundle\Entity\Ingredient;

use AppBundle\Entity\Nutrition\NutritionEmbeddable;
use AppBundle\Strategy\StrategyInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $importId;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Embedded(class="AppBundle\Entity\Nutrition\NutritionEmbeddable")
     */
    protected $nutrition;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $branded;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ingredient\RecipeIngredient", mappedBy="ingredient")
     */
    protected $ingredientRecipes;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Day\Position", mappedBy="ingredient")
     */
    protected $positions;

    public function __construct()
    {
        $this->ingredientRecipes = new ArrayCollection();
        $this->positions = new ArrayCollection();
        $this->nutrition = new NutritionEmbeddable();
        $this->branded = false;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return integer
     */
    public function getImportId()
    {
        return $this->importId;
    }

    /**
     * @param integer $importId
     */
    public function setImportId($importId)
    {
        $this->importId = $importId;
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
     * @return boolean
     */
    public function isBranded()
    {
        return $this->branded;
    }

    /**
     * @param boolean $branded
     */
    public function setBranded($branded)
    {
        $this->branded = $branded;
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

    /**
     * @return NutritionEmbeddable
     */
    public function getNutrition()
    {
        return $this->nutrition;
    }

    /**
     * @param NutritionEmbeddable $nutrition
     * @return Ingredient
     */
    public function setNutrition(NutritionEmbeddable $nutrition)
    {
        $this->nutrition = $nutrition;
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return StrategyInterface
     */
    public abstract function getStrategy();
}