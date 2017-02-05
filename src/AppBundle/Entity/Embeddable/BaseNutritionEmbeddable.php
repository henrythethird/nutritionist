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
    private $starch;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $protein;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $fat;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $calories;

    /**
     * @return mixed
     */
    public function getStarch()
    {
        return $this->starch;
    }

    /**
     * @param mixed $starch
     */
    public function setStarch($starch)
    {
        $this->starch = $starch;
    }

    /**
     * @return mixed
     */
    public function getProtein()
    {
        return $this->protein;
    }

    /**
     * @param mixed $protein
     */
    public function setProtein($protein)
    {
        $this->protein = $protein;
    }

    /**
     * @return mixed
     */
    public function getFat()
    {
        return $this->fat;
    }

    /**
     * @param mixed $fat
     */
    public function setFat($fat)
    {
        $this->fat = $fat;
    }

    /**
     * @return mixed
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * @param mixed $calories
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