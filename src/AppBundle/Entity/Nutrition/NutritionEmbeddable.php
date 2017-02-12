<?php

namespace AppBundle\Entity\Nutrition;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class NutritionEmbeddable
{
    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $carbs = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $protein = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $fat = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $water = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $alcohol = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $calories = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $sugar = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $starch = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $fibres = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $cholesterol = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $fattyAcidsMono = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $fattyAcidsPoly = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $fattyAcidsSaturated = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $sodium = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $potassium = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $chloride = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $calcium = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $magnesium = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $phosphorous = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $iron = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $iodine = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $zinc = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $vitaminA = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $vitaminB1 = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $vitaminB2 = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $vitaminB6 = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $vitaminB12 = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $vitaminC = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $vitaminD = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $vitaminE = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $retinolEquiv = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $betaCarotene = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $niacin = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $folate = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $pantothenicAcid = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     * @var float
     */
    private $betaCaroteneActivity = 0;

    /**
     * @return float
     */
    public function getCarbs()
    {
        return $this->carbs;
    }

    /**
     * @param float $carbs
     * @return NutritionEmbeddable
     */
    public function setCarbs($carbs)
    {
        $this->carbs = $carbs;
        return $this;
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
     * @return NutritionEmbeddable
     */
    public function setProtein($protein)
    {
        $this->protein = $protein;
        return $this;
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
     * @return NutritionEmbeddable
     */
    public function setFat($fat)
    {
        $this->fat = $fat;
        return $this;
    }

    /**
     * @return float
     */
    public function getWater()
    {
        return $this->water;
    }

    /**
     * @param float $water
     * @return NutritionEmbeddable
     */
    public function setWater($water)
    {
        $this->water = $water;
        return $this;
    }

    /**
     * @return float
     */
    public function getAlcohol()
    {
        return $this->alcohol;
    }

    /**
     * @param float $alcohol
     * @return NutritionEmbeddable
     */
    public function setAlcohol($alcohol)
    {
        $this->alcohol = $alcohol;
        return $this;
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
     * @return NutritionEmbeddable
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;
        return $this;
    }

    /**
     * @return float
     */
    public function getSugar()
    {
        return $this->sugar;
    }

    /**
     * @param float $sugar
     * @return NutritionEmbeddable
     */
    public function setSugar($sugar)
    {
        $this->sugar = $sugar;
        return $this;
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
     * @return NutritionEmbeddable
     */
    public function setStarch($starch)
    {
        $this->starch = $starch;
        return $this;
    }

    /**
     * @return float
     */
    public function getFibres()
    {
        return $this->fibres;
    }

    /**
     * @param float $fibres
     * @return NutritionEmbeddable
     */
    public function setFibres($fibres)
    {
        $this->fibres = $fibres;
        return $this;
    }

    /**
     * @return float
     */
    public function getCholesterol()
    {
        return $this->cholesterol;
    }

    /**
     * @param float $cholesterol
     * @return NutritionEmbeddable
     */
    public function setCholesterol($cholesterol)
    {
        $this->cholesterol = $cholesterol;
        return $this;
    }

    /**
     * @return float
     */
    public function getFattyAcidsMono()
    {
        return $this->fattyAcidsMono;
    }

    /**
     * @param float $fattyAcidsMono
     * @return NutritionEmbeddable
     */
    public function setFattyAcidsMono($fattyAcidsMono)
    {
        $this->fattyAcidsMono = $fattyAcidsMono;
        return $this;
    }

    /**
     * @return float
     */
    public function getFattyAcidsPoly()
    {
        return $this->fattyAcidsPoly;
    }

    /**
     * @param float $fattyAcidsPoly
     * @return NutritionEmbeddable
     */
    public function setFattyAcidsPoly($fattyAcidsPoly)
    {
        $this->fattyAcidsPoly = $fattyAcidsPoly;
        return $this;
    }

    /**
     * @return float
     */
    public function getFattyAcidsSaturated()
    {
        return $this->fattyAcidsSaturated;
    }

    /**
     * @param float $fattyAcidsSaturated
     * @return NutritionEmbeddable
     */
    public function setFattyAcidsSaturated($fattyAcidsSaturated)
    {
        $this->fattyAcidsSaturated = $fattyAcidsSaturated;
        return $this;
    }

    /**
     * @return float
     */
    public function getSodium()
    {
        return $this->sodium;
    }

    /**
     * @param float $sodium
     * @return NutritionEmbeddable
     */
    public function setSodium($sodium)
    {
        $this->sodium = $sodium;
        return $this;
    }

    /**
     * @return float
     */
    public function getPotassium()
    {
        return $this->potassium;
    }

    /**
     * @param float $potassium
     * @return NutritionEmbeddable
     */
    public function setPotassium($potassium)
    {
        $this->potassium = $potassium;
        return $this;
    }

    /**
     * @return float
     */
    public function getChloride()
    {
        return $this->chloride;
    }

    /**
     * @param float $chloride
     * @return NutritionEmbeddable
     */
    public function setChloride($chloride)
    {
        $this->chloride = $chloride;
        return $this;
    }

    /**
     * @return float
     */
    public function getCalcium()
    {
        return $this->calcium;
    }

    /**
     * @param float $calcium
     * @return NutritionEmbeddable
     */
    public function setCalcium($calcium)
    {
        $this->calcium = $calcium;
        return $this;
    }

    /**
     * @return float
     */
    public function getMagnesium()
    {
        return $this->magnesium;
    }

    /**
     * @param float $magnesium
     * @return NutritionEmbeddable
     */
    public function setMagnesium($magnesium)
    {
        $this->magnesium = $magnesium;
        return $this;
    }

    /**
     * @return float
     */
    public function getPhosphorous()
    {
        return $this->phosphorous;
    }

    /**
     * @param float $phosphorous
     * @return NutritionEmbeddable
     */
    public function setPhosphorous($phosphorous)
    {
        $this->phosphorous = $phosphorous;
        return $this;
    }

    /**
     * @return float
     */
    public function getIron()
    {
        return $this->iron;
    }

    /**
     * @param float $iron
     * @return NutritionEmbeddable
     */
    public function setIron($iron)
    {
        $this->iron = $iron;
        return $this;
    }

    /**
     * @return float
     */
    public function getIodine()
    {
        return $this->iodine;
    }

    /**
     * @param float $iodine
     * @return NutritionEmbeddable
     */
    public function setIodine($iodine)
    {
        $this->iodine = $iodine;
        return $this;
    }

    /**
     * @return float
     */
    public function getZinc()
    {
        return $this->zinc;
    }

    /**
     * @param float $zinc
     * @return NutritionEmbeddable
     */
    public function setZinc($zinc)
    {
        $this->zinc = $zinc;
        return $this;
    }

    /**
     * @return float
     */
    public function getVitaminA()
    {
        return $this->vitaminA;
    }

    /**
     * @param float $vitaminA
     * @return NutritionEmbeddable
     */
    public function setVitaminA($vitaminA)
    {
        $this->vitaminA = $vitaminA;
        return $this;
    }

    /**
     * @return float
     */
    public function getVitaminB1()
    {
        return $this->vitaminB1;
    }

    /**
     * @param float $vitaminB1
     * @return NutritionEmbeddable
     */
    public function setVitaminB1($vitaminB1)
    {
        $this->vitaminB1 = $vitaminB1;
        return $this;
    }

    /**
     * @return float
     */
    public function getVitaminB2()
    {
        return $this->vitaminB2;
    }

    /**
     * @param float $vitaminB2
     * @return NutritionEmbeddable
     */
    public function setVitaminB2($vitaminB2)
    {
        $this->vitaminB2 = $vitaminB2;
        return $this;
    }

    /**
     * @return float
     */
    public function getVitaminB6()
    {
        return $this->vitaminB6;
    }

    /**
     * @param float $vitaminB6
     * @return NutritionEmbeddable
     */
    public function setVitaminB6($vitaminB6)
    {
        $this->vitaminB6 = $vitaminB6;
        return $this;
    }

    /**
     * @return float
     */
    public function getVitaminB12()
    {
        return $this->vitaminB12;
    }

    /**
     * @param float $vitaminB12
     * @return NutritionEmbeddable
     */
    public function setVitaminB12($vitaminB12)
    {
        $this->vitaminB12 = $vitaminB12;
        return $this;
    }

    /**
     * @return float
     */
    public function getVitaminC()
    {
        return $this->vitaminC;
    }

    /**
     * @param float $vitaminC
     * @return NutritionEmbeddable
     */
    public function setVitaminC($vitaminC)
    {
        $this->vitaminC = $vitaminC;
        return $this;
    }

    /**
     * @return float
     */
    public function getVitaminD()
    {
        return $this->vitaminD;
    }

    /**
     * @param float $vitaminD
     * @return NutritionEmbeddable
     */
    public function setVitaminD($vitaminD)
    {
        $this->vitaminD = $vitaminD;
        return $this;
    }

    /**
     * @return float
     */
    public function getVitaminE()
    {
        return $this->vitaminE;
    }

    /**
     * @param float $vitaminE
     * @return NutritionEmbeddable
     */
    public function setVitaminE($vitaminE)
    {
        $this->vitaminE = $vitaminE;
        return $this;
    }

    /**
     * @return float
     */
    public function getRetinolEquiv()
    {
        return $this->retinolEquiv;
    }

    /**
     * @param float $retinolEquiv
     * @return NutritionEmbeddable
     */
    public function setRetinolEquiv($retinolEquiv)
    {
        $this->retinolEquiv = $retinolEquiv;
        return $this;
    }

    /**
     * @return float
     */
    public function getBetaCarotene()
    {
        return $this->betaCarotene;
    }

    /**
     * @param float $betaCarotene
     * @return NutritionEmbeddable
     */
    public function setBetaCarotene($betaCarotene)
    {
        $this->betaCarotene = $betaCarotene;
        return $this;
    }

    /**
     * @return float
     */
    public function getNiacin()
    {
        return $this->niacin;
    }

    /**
     * @param float $niacin
     * @return NutritionEmbeddable
     */
    public function setNiacin($niacin)
    {
        $this->niacin = $niacin;
        return $this;
    }

    /**
     * @return float
     */
    public function getFolate()
    {
        return $this->folate;
    }

    /**
     * @param float $folate
     * @return NutritionEmbeddable
     */
    public function setFolate($folate)
    {
        $this->folate = $folate;
        return $this;
    }

    /**
     * @return float
     */
    public function getPantothenicAcid()
    {
        return $this->pantothenicAcid;
    }

    /**
     * @param float $pantothenicAcid
     * @return NutritionEmbeddable
     */
    public function setPantothenicAcid($pantothenicAcid)
    {
        $this->pantothenicAcid = $pantothenicAcid;
        return $this;
    }

    /**
     * @return float
     */
    public function getBetaCaroteneActivity()
    {
        return $this->betaCaroteneActivity;
    }

    /**
     * @param float $betaCaroteneActivity
     * @return NutritionEmbeddable
     */
    public function setBetaCaroteneActivity($betaCaroteneActivity)
    {
        $this->betaCaroteneActivity = $betaCaroteneActivity;
        return $this;
    }

    public function toArray()
    {
        return [
            'carbs' => $this->getCarbs(),
            'protein' => $this->getProtein(),
            'fat' => $this->getFat(),
            'calories' => $this->getCalories(),
            'water' => $this->getWater(),
            'alcohol' => $this->getAlcohol(),
            'starch' => $this->getStarch(),
            'sugar' => $this->getSugar(),
            'fibres' => $this->getFibres(),
            'cholesterol' => $this->getCholesterol(),
            'fattyAcidsMono' => $this->getFattyAcidsMono(),
            'fattyAcidsPoly' => $this->getFattyAcidsPoly(),
            'fattyAcidsSaturated' => $this->getFattyAcidsSaturated(),
            'sodium' => $this->getSodium(),
            'potassium' => $this->getPotassium(),
            'chloride' => $this->getChloride(),
            'calcium' => $this->getCalcium(),
            'magnesium' => $this->getMagnesium(),
            'phosphorous' => $this->getPhosphorous(),
            'iron' => $this->getIron(),
            'iodine' => $this->getIodine(),
            'zinc' => $this->getZinc(),
            'vitaminA' => $this->getVitaminA(),
            'vitaminB1' => $this->getVitaminB1(),
            'vitaminB2' => $this->getVitaminB2(),
            'vitaminB6' => $this->getVitaminB6(),
            'vitaminB12' => $this->getVitaminB12(),
            'vitaminC' => $this->getVitaminC(),
            'vitaminD' => $this->getVitaminD(),
            'vitaminE' => $this->getVitaminE(),
            'retinolEquiv' => $this->getRetinolEquiv(),
            'betaCarotene' => $this->getBetaCarotene(),
            'niacin' => $this->getNiacin(),
            'folate' => $this->getFolate(),
            'pantothenicAcid' => $this->getPantothenicAcid(),
            'betaCaroteneActivity' => $this->getBetaCaroteneActivity()
        ];
    }

    public function fromArray(array $array)
    {
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    public function add(NutritionEmbeddable $embeddable)
    {
        foreach ($embeddable->toArray() as $key => $value) {
            $this->$key += $value;
        }
        return $this;
    }

    public function multiply($factor)
    {
        foreach ($this->toArray() as $key => $value) {
            $this->$key *= $factor;
        }
        return $this;
    }
}