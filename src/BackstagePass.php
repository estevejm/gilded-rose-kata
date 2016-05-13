<?php

class BackstagePass extends AdaptedItem
{
    public function __construct($sellIn, $quality)
    {
        parent::__construct("Backstage Pass", $sellIn, $quality);
    }

    protected function recalculateQuality()
    {
        if ($this->hasSellDayPassed()) {
            return 0;
        }

        return parent::recalculateQuality();
    }

    protected function getQualityDiff()
    {
        if ($this->getSellInDays() <= 5) {
            return 3;
        }

        if ($this->getSellInDays() <= 10) {
            return 2;
        }

        return 1;
    }

}
