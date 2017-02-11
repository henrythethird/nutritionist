<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Day\Week;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template("default/index.html.twig")
     */
    public function indexAction()
    {
        /** @var Week[] $day */
        $weeks = $this->getDoctrine()->getRepository(Week::class)
            ->findBy([], ['year' => 'ASC', 'weekNumber' => 'ASC']);

        return [
            'weeks' => $weeks
        ];
    }
}
