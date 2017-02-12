<?php

namespace AppBundle\Listener;

use AppBundle\Collection\IdentifiableCollection;
use AppBundle\Entity\Day\Day;
use AppBundle\Entity\Day\Week;
use AppBundle\Entity\Nutrition\NutritionEmbeddable;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;

class WeekRecalculateListener extends ContainerAwareListener
{
    private $idCollection;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);

        $this->idCollection = new IdentifiableCollection();
    }

    protected function processPreUpdate(PreUpdateEventArgs $args)
    {
        /** @var Day $day */
        $day = $args->getObject();
        $week = $day->getWeek();
        $this->idCollection->add($week);
    }

    protected function processPostFlush(PostFlushEventArgs $eventArgs)
    {
        $weeks = $this->idCollection->toArray();
        if (!$weeks) {
            return;
        }

        /** @var Week $week */
        foreach ($this->idCollection->toArray() as $week) {
            $this->recalculate($week);
        }

        $this->idCollection->clear();
        $this->getEntityManager()->flush();
    }

    private function recalculate(Week $week)
    {
        $sum = new NutritionEmbeddable();
        foreach ($week->getDays() as $day) {
            $sum->add($day->getNutrition());
        }

        $week->setNutrition($sum);
    }

    protected function getClass()
    {
        return Day::class;
    }
}