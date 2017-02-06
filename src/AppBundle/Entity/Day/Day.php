<?php

namespace AppBundle\Entity\Day;


use AppBundle\Collection\PositionCollectionInterface;
use AppBundle\Entity\Embeddable\BaseNutritionEmbeddable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class Day implements PositionCollectionInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", unique=true)
     */
    private $date;

    /**
     * @ORM\Embedded(class="AppBundle\Entity\Embeddable\BaseNutritionEmbeddable")
     */
    protected $nutrition;

    /**
     * @ORM\OneToMany(
     *     targetEntity="AppBundle\Entity\Day\Position",
     *     mappedBy="day",
     *     cascade={"persist", "remove"
     * })
     */
    private $positions;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
        $this->nutrition = new BaseNutritionEmbeddable();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return BaseNutritionEmbeddable
     */
    public function getNutrition()
    {
        return $this->nutrition;
    }

    /**
     * @param BaseNutritionEmbeddable $nutrition
     */
    public function setNutrition(BaseNutritionEmbeddable $nutrition)
    {
        $this->nutrition = $nutrition;
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

    public function addPosition(Position $position)
    {
        $position->setDay($this);
        $this->positions->add($position);
    }

    public function removePosition(Position $position)
    {
        $this->positions->removeElement($position);
    }
}