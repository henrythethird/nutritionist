<?php

namespace AppBundle\Entity\Day;

use AppBundle\Entity\Ingredient\Ingredient;
use AppBundle\Entity\Measure;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class Position
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Day\Day", inversedBy="positions")
     */
    private $day;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Day\PositionType", inversedBy="positions")
     */
    private $type;

    /**
     * @ORM\OneToOne(
     *     targetEntity="AppBundle\Entity\Measure",
     *     cascade={"persist"},
     *     fetch="EAGER"
     * )
     */
    private $measure;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingredient\Ingredient", inversedBy="positions")
     */
    private $ingredient;

    public function __construct()
    {
        $this->measure = new Measure();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return PositionType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param PositionType $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return Day
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param Day $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return Measure
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * @param Measure $measure
     */
    public function setMeasure($measure)
    {
        $this->measure = $measure;
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
    public function setIngredient($ingredient)
    {
        $this->ingredient = $ingredient;
    }
}