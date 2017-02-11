<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Day\Day;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DayController extends Controller
{
    /**
     * @Route("/day/{id}", name="day_index")
     * @Template("day/index.html.twig")
     */
    public function indexAction(Day $day)
    {
        return [
            'day' => $day
        ];
    }
}