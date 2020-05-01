<?php

namespace Acquia\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Acquia\Services\Robot;
use Acquia\Services\CarpetFloor;
use Acquia\Services\HardFloor;

class Clean extends Command {

    protected static $defaultName = 'clean';

    public function __construct() {
        parent::__construct();
    }

    protected function configure() {
        $this->addOption('floor', 'f', InputArgument::OPTIONAL, 'Type of floor.', 'carpet');
        $this->addOption('area', 'a', InputArgument::OPTIONAL, 'Area of floor.', 0);
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        switch ($input->getOption('floor')) {
            case'carpet' :
                $floor = new CarpetFloor($input->getOption('area'));
                break;
            case'hard' :
                $floor = new HardFloor($input->getOption('area'));
                break;
            default :
                throw new \Exception('Floor type is not valid.');
        }

        $robot = new Robot($floor);
        $robot->start();
        $output->writeln('Cleaning Process completed.');

        return 0;
    }

}
