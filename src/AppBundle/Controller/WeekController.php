<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Day\Week;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class WeekController extends BaseDavController
{
    /**
     * @Route("/week/{id}", name="week_show")
     * @Template("week/show.html.twig")
     */
    public function showAction(Week $week)
    {
        return [
            'week' => $week,
            'dav' => $this->getDavWeek()
        ];
    }
}