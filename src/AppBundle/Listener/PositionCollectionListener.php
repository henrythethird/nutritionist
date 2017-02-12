<?php

namespace AppBundle\Listener;

use AppBundle\Collection\PositionCollectionInterface;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class PositionCollectionListener extends ContainerAwareListener
{
    private $hasUpdate = false;

    protected function getClass()
    {
        return PositionCollectionInterface::class;
    }

    protected function processPreUpdate(PreUpdateEventArgs $args)
    {
        /** @var PositionCollectionInterface $position */
        $position = $args->getObject();

        $this->getContainer()
            ->get('app.service.summarize')
            ->recalculateRecipeNutrition($position);

        $this->hasUpdate = true;
    }

    protected function processPostFlush(PostFlushEventArgs $eventArgs)
    {
        if (!$this->hasUpdate) {
            return true;
        }

        $this->getEntityManager()->flush();
    }
}