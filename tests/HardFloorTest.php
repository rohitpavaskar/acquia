<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Acquia\Services\HardFloor;

class HardFloorTest extends TestCase {

    private $hardFloor;

    /**
     * Basic setup for tests
     */
    public function setUp(): void {
        $this->hardFloor = new HardFloor(70);
    }

    /**
     * Test getCleaningTime
     */
    public function testGetCleaningTime(): void {
        $result = $this->hardFloor->getCleaningTime();
        $this->assertEquals(1, $result);
    }

}
