<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BaseUnitRepository extends EntityRepository
{
    public function findBase()
    {
        return $this->findBy(['base' => true]);
    }
}