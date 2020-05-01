<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Acquia\Services\CarpetFloor;

class CarpetFloorTest extends TestCase {

    private $carpetFloor;

    /**
     * Basic setup for tests
     */
    public function setUp(): void {
        $this->carpetFloor = new CarpetFloor(70);
    }

    /**
     * Test getCleaningTime
     */
    public function testGetCleaningTime(): void {
        $result = $this->carpetFloor->getCleaningTime();
        $this->assertEquals(2, $result);
    }

}
