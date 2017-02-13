<?php

namespace AppBundle\Entity\Unit;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "volume" = "VolumeUnit",
 *     "weight" = "WeightUnit"
 * })
 * @UniqueEntity(fields={"name"})
 */
abstract class Unit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @Assert\GreaterThan(0)
     */
    protected $baseRatio;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $base;

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

    /**
     * @return boolean
     */
    public function isBase()
    {
        return $this->base;
    }

    /**
     * @param boolean $base
     */
    public function setBase($base)
    {
        $this->base = $base;
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