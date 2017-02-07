<?php

namespace AppBundle\Listener;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class ContainerAwareListener
{
    /**
     * @var ContainerInterface
     */
    private $container;

    private $entitesHaveChanged = false;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        if (!$this->isInstance($args->getObject())) {
            return;
        }

        $this->processPreUpdate($args);
        $this->entitesHaveChanged = true;
    }

    protected function processPreUpdate(PreUpdateEventArgs $args)
    {

    }

    public function postFlush(PostFlushEventArgs $eventArgs)
    {
        if (!$this->entitesHaveChanged) {
            return;
        }

        $this->processPostFlush($eventArgs);
        $this->entitesHaveChanged = false;
    }

    protected function processPostFlush(PostFlushEventArgs $eventArgs)
    {

    }

    /**
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        return $this->container;
    }

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager()
    {
        return $this->getContainer()->get('doctrine.orm.default_entity_manager');
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepository()
    {
        return $this->getEntityManager()->getRepository($this->getClass());
    }

    protected abstract function getClass();

    protected function isInstance($object)
    {
        return is_subclass_of($object, $this->getClass());
    }
}