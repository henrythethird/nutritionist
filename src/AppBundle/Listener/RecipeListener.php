<?php

namespace AppBundle\Listener;


use AppBundle\Entity\Ingredient\Recipe;
use AppBundle\Service\SummarizeService;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class RecipeListener
{
    /**
     * @var SummarizeService
     */
    private $summarize;

    public function __construct(SummarizeService $summarize)
    {
        $this->summarize = $summarize;
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof Recipe) {
            return;
        }

        $this->summarize->recalculateRecipeNutrition($entity);
    }
}