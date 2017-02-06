<?php

namespace AppBundle\Listener;

use AppBundle\Collection\PositionCollectionInterface;
use AppBundle\Service\SummarizeService;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class PositionCollectionListener
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

        if (!$entity instanceof PositionCollectionInterface) {
            return;
        }

        $this->summarize->recalculateRecipeNutrition($entity);
    }
}