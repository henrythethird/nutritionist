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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Day\Position", mappedBy="type")
     */
    private $positions;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
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
     * @return Position[]|ArrayCollection
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param Position[]|ArrayCollection $positions
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;
    }

    public function __toString()
    {
        return $this->getName();
    }
}