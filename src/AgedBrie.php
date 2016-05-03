<?php

class AgedBrie extends AdaptedItem
{
    /**
     * @param $sellIn
     * @param $quality
     */
    public function __construct($sellIn, $quality)
    {
        parent::__construct("Aged Brie", $sellIn, $quality);
    }

    protected function getQualityDiff()
    {
        if ($this->hasSellDayPassed()) {
            return 2;
        }

        return 1;
    }
}
