<?php

namespace AppBundle\Controller;

use AppBundle\Aggregate\DayAggregate;
use AppBundle\Entity\Day\Day;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DayController extends BaseDavController
{
    /**
     * @Route("/day/{id}", name="day_index")
     * @Template("day/index.html.twig")
     */
    public function indexAction(Day $day)
    {
        $aggregate = new DayAggregate($day);

        return [
            'dav' => $this->getDav(),
            'aggregate' => $aggregate
        ];
    }
}