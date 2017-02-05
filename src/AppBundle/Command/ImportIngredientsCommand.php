<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportIngredientsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->addArgument('file', InputArgument::REQUIRED, 'File or URL')
            ->setName('app:ingredients:swiss:import')
            ->setDescription('Import Ingredients');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $this->createTemporaryFile();
        file_put_contents($file, file_get_contents($input->getArgument('file')));

        $this->getContainer()->get('app.service.swiss_import')
            ->import($file);
    }

    private function createTemporaryFile()
    {
        return tempnam("/tmp", "import");
    }
}
