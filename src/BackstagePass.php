<?php

class BackstagePass extends AdaptedItem
{
    public function __construct($sellIn, $quality)
    {
        parent::__construct("Backstage Pass", $sellIn, $quality);
    }

    protected function recalculateQuality()
    {
        return $this->getQuality() + 1;
    }
}
