<?php

namespace Acquia\Services;

interface FloorInterface {

    /**
     * Set area of floor.
     * 
     * @param int $area
     * 
     * @return void
     */
    public function setArea(int $area);

    /**
     * Get area of floor.
     * 
     * @return int
     */
    public function getArea(): int;
}
