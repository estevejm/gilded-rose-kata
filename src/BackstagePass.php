<?php

class BackstagePass extends AdaptedItem
{
    public function __construct($sellIn, $quality)
    {
        parent::__construct("Backstage Pass", $sellIn, $quality);
    }

    protected function getQualityDiff()
    {
        if ($this->hasSellDayPassed()) {
            return - $this->getQuality();
        }

        if ($this->getSellInDays() <= 5) {
            return 3;
        }

        if ($this->getSellInDays() <= 10) {
            return 2;
        }

        return 1;
    }

}
