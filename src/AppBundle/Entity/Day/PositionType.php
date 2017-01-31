<?php

namespace AppBundle\Entity\Day;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class PositionType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $position = 0;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Day\DayPosition", mappedBy="type")
     */
    private $dayPositions;

    public function __construct()
    {
        $this->dayPositions = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param integer $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return DayPosition[]|ArrayCollection
     */
    public function getDayPositions()
    {
        return $this->dayPositions;
    }

    /**
     * @param DayPosition[]|ArrayCollection $dayPositions
     */
    public function setDayPositions($dayPositions)
    {
        $this->dayPositions = $dayPositions;
    }

    public function __toString()
    {
        return $this->getName();
    }
}