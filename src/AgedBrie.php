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

    protected function recalculateQuality()
    {
        $newQuality = $this->getQuality() + 1;

        if ($this->getSellInDays() == 0) {
            $newQuality += 1;
        }

        return $newQuality;
    }
}
