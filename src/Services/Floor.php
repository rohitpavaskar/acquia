<?php

namespace Acquia\Services;

class Floor {

    /**
     * Area of floor.
     * 
     * @var int
     */
    private $area;

    /**
     * Area of floor which needs cleaning.
     * 
     * @var int
     */
    private $areaRemainsToClean;

    public function __construct(int $area) {
        $this->setArea($area);
    }

    /**
     * Set area of floor.
     *
     * @param int $area
     * 
     * @return void
     */
    public function setArea(int $area) {
        if (0 >= $area) {
            throw new \Exception('Unable to set area of floor.');
        }

        $this->area = $area;
        $this->areaRemainsToClean = $area;
    }

    /**
     * Get area of floor.
     *
     * @return int
     */
    public function getArea(): int {
        return $this->area;
    }

    /**
     * Update remaining area after completing cleaning for each square feet.
     *
     * @param int $area
     * 
     * @return void
     */
    public function doneCleaning() {
        $this->areaRemainsToClean = $this->areaRemainsToClean() - 1;
    }

    /**
     * Get area which needs to be clean.
     * 
     * @return int
     */
    public function areaRemainsToClean() {
        return $this->areaRemainsToClean;
    }

}
