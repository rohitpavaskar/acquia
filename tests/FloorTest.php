<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Acquia\Services\Floor;

class FloorTest extends TestCase {

    private $floorChild;

    /**
     * Basic setup for tests
     */
    public function setUp(): void {
        $this->floorChild = new class extends Floor {

            public function __construct() {
                parent::__construct(100);
            }
        };
    }

    /**
     * Test setArea
     */
    public function testSetArea(): void {
        $this->floorChild->setArea(200);
        $this->assertEquals(200, $this->floorChild->getArea());
    }

    /**
     * Test getArea
     */
    public function testGetArea(): void {
        $this->assertEquals(100, $this->floorChild->getArea());
    }

    /**
     * Test areaRemainsToClean
     */
    public function testAreaRemainsToClean(): void {
        $this->assertEquals(100, $this->floorChild->areaRemainsToClean());
    }

    /**
     * Test coneCleaning
     */
    public function testDoneCleaning(): void {
        $this->floorChild->doneCleaning();
        $this->assertEquals(99, $this->floorChild->areaRemainsToClean());
    }

}
