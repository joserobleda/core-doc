<?php

namespace JR\CoreDocBundle\Command;

use JR\CoreDocBundle\Annotation\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CoreDocCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('coredoc:display')
            ->setDescription('Display all available commands')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("---- CORE DOC ----");

        $parser = $this->getContainer()->get('core_doc.handler_parser');
        $docs = $parser->parse();

        /** @var Command $command */
        foreach ($docs as $command) {
            $output->writeln("👉 {$command->getClassName()} - {$command->getDescription()}");
        }
    }
}
