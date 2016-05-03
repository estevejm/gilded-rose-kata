<?php

class BackstagePass extends AdaptedItem
{
    public function __construct($sellIn, $quality)
    {
        parent::__construct("Backstage Pass", $sellIn, $quality);
    }

    protected function recalculateQuality()
    {
        if ($this->getSellInDays() == 0) {
            return 0;
        }

        $newQuality = $this->getQuality() + 1;

        if ($this->getSellInDays() <= 10) {
            $newQuality++;
        }

        if ($this->getSellInDays() <= 5) {
            $newQuality++;
        }

        return $newQuality;
    }
}
