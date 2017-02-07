<?php

namespace AppBundle\Listener;


use AppBundle\Entity\Unit\Unit;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

abstract class BaseUnitListener extends ContainerAwareListener
{
    private $entity = null;

    protected function processPreUpdate(PreUpdateEventArgs $args)
    {
        if (!$args->hasChangedField('base') || !$args->getNewValue('base')) {
            return;
        }
        
        $this->entity = $args->getObject();
    }

    protected function processPostFlush(PostFlushEventArgs $eventArgs)
    {
        if (!$this->entity) {
            return;
        }

        $this->setSingle($this->entity);
        $this->getEntityManager()->flush();
    }

    private function setSingle(Unit $entity)
    {
        $this->resetAll();
        $entity->setBase(true);
    }

    private function resetAll()
    {
        $units = $this->getRepository()
            ->findAll();

        /** @var Unit $unit */
        foreach ($units as $unit) {
            $unit->setBase(false);
        }
    }
}