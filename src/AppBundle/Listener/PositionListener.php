<?php

namespace AppBundle\Listener;

use AppBundle\Collection\PositionCollectionInterface;
use AppBundle\Collection\PositionInterface;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class PositionListener extends ContainerAwareListener
{
    /**
     * @var PositionCollectionInterface[]
     */
    private $collection = [];

    protected function getClass()
    {
        return PositionInterface::class;
    }

    protected function processPreUpdate(PreUpdateEventArgs $args)
    {
        /** @var PositionInterface $position */
        $position = $args->getObject();
        $collection = $position->getParent();

        $this->collection[$collection->getId()] = $collection;
    }

    protected function processPostFlush(PostFlushEventArgs $eventArgs)
    {
        if (!$this->collection) {
            return;
        }

        foreach ($this->collection as $position) {
            $this->getContainer()
                ->get('app.service.summarize')
                ->recalculateRecipeNutrition($position);
        }

        $this->collection = [];
        $this->getEntityManager()->flush();
    }
}