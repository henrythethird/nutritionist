<?php

namespace AppBundle\Service;


use AppBundle\Entity\Ingredient\Ingredient;
use AppBundle\Entity\Ingredient\VolumeIngredient;
use AppBundle\Entity\Ingredient\WeightIngredient;
use AppBundle\Reader\ExcelReader;
use Doctrine\ORM\EntityManagerInterface;

class SwissDatabaseExcelImportService
{
    const IMPORT_ID = 0;
    const TYPE = 18;

    private static $ingredientMapping = [
        0 => 'importId',
        3 => 'name',
    ];

    private static $baseNutritionMapping = [
        21 => 'calories',
        26 => 'protein',
        41 => 'carbs',
        46 => 'starch',
        61 => 'fat',
    ];

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function import($file)
    {
        $excel = new ExcelReader($file);

        foreach ([0,1] as $index) {
            $excel->changeSheet($index);
            $this->importData($excel->readAll(), $index);
        }

        $this->entityManager->flush();
    }

    private function importData(array $data, $branded = 0)
    {
        foreach ($data as $lineNumber => $line) {
            if ($lineNumber < 3) continue;
            if (!$line[self::TYPE]) continue;

            $ingredient = $this->createIngredient($line[self::IMPORT_ID], $line[self::TYPE]);

            $ingredient->setBranded($branded);
            $this->applyIngredientMapping($ingredient, $line);
            $this->applyNutritionMapping($ingredient, $line);

            $this->entityManager->persist($ingredient);
        }
    }

    /**
     * @param string $typeHint
     * @return Ingredient
     */
    private function createIngredient($importId, $typeHint)
    {
        $ingredient = $this->entityManager->getRepository(Ingredient::class)
            ->findOneBy(['importId' => $importId]);

        if ($ingredient) {
            return $ingredient;
        }

        if ($typeHint == 'per 100g edible portion') {
            return new WeightIngredient();
        }

        return new VolumeIngredient();
    }

    private function applyIngredientMapping(Ingredient $ingredient, $line)
    {
        $this->applyMapping($ingredient, self::$ingredientMapping, $line);
    }

    private function applyNutritionMapping(Ingredient $ingredient, $line)
    {
        $this->applyMapping($ingredient->getNutrition(), self::$baseNutritionMapping, $line);
    }

    private function applyMapping($object, array $mapping, array $data)
    {
        foreach ($mapping as $index => $attribute) {
            $method = "set".ucfirst($attribute);
            $object->$method($data[$index] ?: 0);
        }
    }
}