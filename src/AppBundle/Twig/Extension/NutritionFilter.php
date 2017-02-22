<?php

namespace AppBundle\Twig\Extension;

class NutritionFilter extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('nutrition', [$this, 'nutritionFilter']),
        );
    }

    /**
     * @param int|float $number
     * @return string
     */
    public function nutritionFilter($number, $length = 2)
    {
        $price = number_format($number, $length);

        return $price;
    }

    public function getName()
    {
        return 'app_nutrition_filter';
    }
}
