<?php

namespace Acquia\Services;

interface FloorCleanerInterface extends FloorInterface {

    /**
     * Get time needs to clean per square meter area.
     *
     * @return  $int
     */
    public function getCleaningTime(): int;

    /**
     * Update remaining area after completing cleaning for each square feet.
     *
     * @return void
     */
    public function doneCleaning();

    /**
     * Get area which needs to be clean.
     *
     * @return void
     */
    public function areaRemainsToClean();
}
