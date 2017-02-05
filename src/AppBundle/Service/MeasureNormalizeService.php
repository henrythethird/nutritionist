<?php

namespace AppBundle\Service;

use AppBundle\Entity\Measure;
use Doctrine\ORM\EntityManagerInterface;

class MeasureNormalizeService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function normalize(Measure $measure)
    {

    }
}