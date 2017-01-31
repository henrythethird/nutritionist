<?php

namespace AppBundle\Entity\Day;

use AppBundle\Entity\Ingredient\Ingredient;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="day_position")
 */
class DayPosition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Day\PositionType", inversedBy="dayPositions")
     */
    private $type;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $numberOfServings;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingredient\Ingredient", inversedBy="dayPositions")
     */
    private $ingredient;

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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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