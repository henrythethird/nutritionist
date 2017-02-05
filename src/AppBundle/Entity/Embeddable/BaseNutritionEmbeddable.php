<?php

namespace AppBundle\Entity\Embeddable;

use AppBundle\Serialize\ArraySerializable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class BaseNutritionEmbeddable implements ArraySerializable
{
    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $carbs = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $starch = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $protein = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $fat = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $calories = 0;

    /**
     * @return float
     */
    public function getCarbs()
    {
        return $this->carbs;
    }

    /**
     * @param float $carbs
     */
    public function setCarbs($carbs)
    {
        $this->carbs = $carbs;
    }

    /**
     * @return float
     */
    public function getStarch()
    {
        return $this->starch;
    }

    /**
     * @param float $starch
     */
    public function setStarch($starch)
    {
        $this->starch = $starch;
    }

    /**
     * @return float
     */
    public function getProtein()
    {
        return $this->protein;
    }

    /**
     * @param float $protein
     */
    public function setProtein($protein)
    {
        $this->protein = $protein;
    }

    /**
     * @return float
     */
    public function getFat()
    {
        return $this->fat;
    }

    /**
     * @param float $fat
     */
    public function setFat($fat)
    {
        $this->fat = $fat;
    }

    /**
     * @return float
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * @param float $calories
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;
    }

    public function add(BaseNutritionEmbeddable $embeddable)
    {
        foreach ($embeddable->toArray() as $key => $value) {
            $this->$key += $value;
        }
    }

    public function multiply($factor)
    {
        foreach ($this->toArray() as $key => $value) {
            $this->$key *= $factor;
        }
    }

    public function toArray()
    {
        return [
            'starch' => $this->getStarch(),
            'protein' => $this->getProtein(),
            'fat' => $this->getFat(),
            'calories' => $this->getCalories()
        ];
    }

    public function fromArray(array $array)
    {
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }
    }
}