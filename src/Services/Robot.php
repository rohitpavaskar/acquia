<?php

namespace Acquia\Services;

use Acquia\Services\FloorInterface;

class Robot {

    /**
     * Time to charge robot from 0 to 100%.
     *
     * @var string
     */
    const CHARGING_TIME = 30;

    /**
     * Time robot can clean in one charge.
     *
     * @var string
     */
    const CLEANING_TIME_PER_CHARGE = 60;

    /**
     * Remaining battery time in seconds
     *
     * @var int
     */
    private $remainingBatteryTime = self::CHARGING_TIME;

    /**
     * The floor instance need to clean by robot.
     *
     * @var Acquia\Services\FloorInterface
     */
    private $floor;

    public function __construct(FloorInterface $floor) {
        $this->floor = $floor;
    }

    /**
     * Start the cleaning process.
     * 
     * @return void
     */
    public function start() {
        echo sprintf("Cleaning process started." . PHP_EOL);
        $this->clean();
    }

    /**
     * Clean floor until cleaning completed.
     * 
     * @return void
     */
    private function clean() {
        echo $this->floor->areaRemainsToClean();
        while ($this->floor->areaRemainsToClean()) {
            $this->useBattery();
        }
    }

    /**
     * Charge Battery
     * 
     * @return void
     */
    private function charge() {
        $this->remainingBatteryTime = self::CHARGING_TIME;
        echo sprintf("Battery is charging." . PHP_EOL);
    }

    /**
     * Get remaining battery time.
     * 
     * @return int
     */
    public function remainingBattery(): int {
        return $this->remainingBatteryTime;
    }

    /**
     * Use battery and clean floor.
     * 
     * @param int $time
     * 
     * @return void
     */
    public function useBattery() {
        $time = $this->floor->getCleaningTime();
        if ($time <= $this->remainingBattery()) {
            $this->remainingBatteryTime = $this->remainingBattery() - $time;
            $this->floor->doneCleaning();
            echo sprintf("Battery Remaining for %s seconds" . PHP_EOL, $this->remainingBattery());
        } else {
            $this->charge();
        }
    }

}
