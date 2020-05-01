<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Acquia\Services\Robot;
use Acquia\Services\CarpetFloor;

/**
 * Class PaymentCommandTest
 */
class RobotTest extends TestCase {

    /**
     * @var Acquia\Services\Robot
     */
    protected $robot;

    /**
     * @var Acquia\Services\Robot
     */
    protected $floor;

    /**
     * Basic setup for tests
     */
    public function setUp(): void {
        $this->floor = new CarpetFloor(100);
        $this->robot = new Robot($this->floor);
    }

    /**
     * Test start
     */
    public function testStart(): void {
        $this->robot->start();
        $this->assertEquals(10, $this->robot->remainingBattery());
    }

    /**
     * Test remainingBattery
     */
    public function testRemainingBattery(): void {
        $this->assertEquals(30, $this->robot->remainingBattery());
    }

    /**
     * Test useBattery
     */
    public function testUseBattery(): void {
        $this->robot->useBattery();
        $this->assertEquals(28, $this->robot->remainingBattery());
    }

}
