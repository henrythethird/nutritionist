<?php

namespace AppBundle\Entity\Unit;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "volume" = "VolumeUnit",
 *     "weight" = "WeightUnit"
 * })
 */
abstract class Unit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @Assert\GreaterThan(0)
     */
    private $baseRatio;

    /**
     * @return int
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
     * @return float
     */
    public function getBaseRatio()
    {
        return $this->baseRatio;
    }

    /**
     * @param float $baseRatio
     */
    public function setBaseRatio($baseRatio)
    {
        $this->baseRatio = $baseRatio;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public abstract function getBaseUnit();
}