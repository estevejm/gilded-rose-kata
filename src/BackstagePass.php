<?php

class BackstagePass extends AdaptedItem
{
    public function __construct($sellIn, $quality)
    {
        parent::__construct("Backstage Pass", $sellIn, $quality);
    }

    protected function recalculateQuality()
    {
        $newQuality = $this->getQuality() + 1;

        if ($this->getSellInDays() <= 10) {
            $newQuality++;
        }

        return $newQuality;
    }
}
