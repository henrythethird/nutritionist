<?php

namespace AppBundle\Entity\Day;

use AppBundle\Entity\IdentifiableInterface;
use AppBundle\Entity\Nutrition\NutritionEmbeddable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table
 * @UniqueEntity(fields={"weekNumber", "year"})
 */
class Week implements IdentifiableInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(
     *     targetEntity="AppBundle\Entity\Day\Day",
     *     cascade={"persist"},
     *     mappedBy="week"
     * )
     */
    private $days;

    /**
     * @ORM\Column(type="integer")
     */
    private $weekNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Embedded(class="AppBundle\Entity\Nutrition\NutritionEmbeddable")
     */
    private $nutrition;

    public function __construct($year = null, $weekNumber = null)
    {
        $this->days = new ArrayCollection();
        $this->nutrition = new NutritionEmbeddable();

        $this->year = $year;
        $this->weekNumber = $weekNumber;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Week
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Day[]|ArrayCollection
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param Day[] $days
     * @return Week
     */
    public function setDays($days)
    {
        $this->days = $days;
        return $this;
    }

    /**
     * @param Day $day
     * @return $this
     */
    public function addDay(Day $day)
    {
        $day->setWeek($this);
        $this->days->add($day);
        return $this;
    }

    /**
     * @param Day $day
     * @return $this
     */
    public function removeDay(Day $day)
    {
        $this->days->removeElement($day);
        return $this;
    }

    /**
     * @return integer
     */
    public function getWeekNumber()
    {
        return $this->weekNumber;
    }

    /**
     * @param integer $weekNumber
     * @return Week
     */
    public function setWeekNumber($weekNumber)
    {
        $this->weekNumber = $weekNumber;
        return $this;
    }

    /**
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param integer $year
     * @return Week
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
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
     * @return Week
     */
    public function setNutrition(NutritionEmbeddable $nutrition)
    {
        $this->nutrition = $nutrition;
        return $this;
    }

    public function __toString()
    {
        return $this->getYear().' '.$this->getWeekNumber();
    }
}