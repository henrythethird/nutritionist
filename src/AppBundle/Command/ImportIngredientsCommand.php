<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportIngredientsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:ingredients:import')
            ->setDescription('Import Ingredients');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}
