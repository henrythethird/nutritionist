<?php

namespace AppBundle\Listener;

use AppBundle\Entity\Day\Day;
use AppBundle\Entity\Day\Week;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class DayToWeekAssignerListener extends ContainerAwareListener
{
    /**
     * @var Day[]
     */
    private $days = [];

    protected function getClass()
    {
        return Day::class;
    }

    protected function processPreUpdate(PreUpdateEventArgs $args)
    {
        $this->days[] = $args->getObject();
    }

    protected function processPostFlush(PostFlushEventArgs $eventArgs)
    {
        if (!$this->days) {
            return;
        }

        foreach ($this->days as $day) {
            $date = $day->getDate();
            $year = $date->format('Y');
            $weekNumber = $date->format('W');
            if ($this->weekCorrect($weekNumber, $year, $day)) {
                continue;
            }

            $week = $this->findWeekByNumberAndYear($weekNumber, $year);

            $week->addDay($day);
        }

        $this->days = [];
        $this->getEntityManager()->flush();
    }

    private function weekCorrect($weekNumber, $year, Day $day)
    {
        $week = $day->getWeek();
        if (!$week) {
            return false;
        }

        return $weekNumber == $week->getWeekNumber()
            && $year == $week->getYear();
    }

    /**
     * @param $weekNumber
     * @return Week
     */
    private function findWeekByNumberAndYear($weekNumber, $year)
    {
        $weekRepository = $this->getEntityManager()->getRepository(Week::class);

        $week = $weekRepository->findOneBy([
            'weekNumber' => $weekNumber,
            'year' => $year
        ]);

        if (!$week) {
            $week = new Week($year, $weekNumber);
            $this->getEntityManager()->persist($week);
        }

        return $week;
    }
}