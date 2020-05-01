<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Acquia\Commands\Clean;
use Symfony\Component\Console\Tester\CommandTester;

class CleanTest extends TestCase {

    private $command;

    /**
     * Basic setup
     */
    public function setUp(): void {
        $application = new Application();
        $application->add(new Clean());

        $this->command = $application->find('clean');
    }

    /**
     * Test execute
     */
    public function testExecute(): void {

        $commandTester = new CommandTester($this->command);

        $commandTester->execute([
            '--floor' => 'hard',
            '--area' => 70
        ]);
        $this->assertStringContainsString('Cleaning Process completed.', $commandTester->getDisplay());
    }

    /**
     * Test execute
     */
    public function testException(): void {

        $commandTester = new CommandTester($this->command);
        $this->expectExceptionMessage('Unable to set area of floor.');
        $commandTester->execute([
            '--floor' => 'hard',
            '--area' => 0
        ]);
    }

}
