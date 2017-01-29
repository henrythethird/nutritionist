<?php

namespace AppBundle\Listener;

use AppBundle\Entity\Unit\Unit;
use AppBundle\Entity\Unit\VolumeUnit;
use AppBundle\Entity\Unit\WeightUnit;
use Doctrine\Common\Persistence\Event\PreUpdateEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UnitListener
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $unit = $args->getObject();

        if (!$unit instanceof Unit) {
            return;
        }

        $this->removeBase($unit instanceof VolumeUnit ? VolumeUnit::class : WeightUnit::class);
        $unit->setBase(true);
    }

    private function removeBase($class)
    {
        $unitElements = $this->container->get('doctrine')
            ->getRepository($class)
            ->findAll();

        /** @var Unit $unit */
        foreach ($unitElements as $unit) {
            $unit->setBase(false);
        }
    }
}