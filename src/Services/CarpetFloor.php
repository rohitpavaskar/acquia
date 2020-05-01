<?php

namespace Acquia\Services;

class CarpetFloor extends Floor implements FloorCleanerInterface {

    /**
     * Time to clean per square meter area.
     *
     * @var int
     */
    const CLEANING_TIME_PER_SQ_M = 2;

    public function __construct(int $area) {
        parent::__construct($area);
    }

    /**
     * get Cleaning time for cleaning per square meter area.
     *
     * @return int
     */
    public function getCleaningTime(): int {
        return self::CLEANING_TIME_PER_SQ_M;
    }

}
