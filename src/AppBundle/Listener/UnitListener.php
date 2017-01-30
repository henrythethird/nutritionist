<?php

namespace AppBundle\Listener;

use AppBundle\Entity\Unit\Unit;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
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

    }

    public function postFlush(PostFlushEventArgs $args)
    {

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