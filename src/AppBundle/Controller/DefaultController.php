<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Day\Day;
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
        /** @var Day $day */
        $day = $this->getDoctrine()->getRepository(Day::class)
            ->find(1);

        return [
            'day' => $day
        ];
    }
}
