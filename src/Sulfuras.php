<?php

class Sulfuras extends AdaptedItem
{
    const LEGENDARY_ITEM_QUALITY = 80;

    public function __construct()
    {
        parent::__construct("Sulfuras", null, self::LEGENDARY_ITEM_QUALITY);
    }

    protected function recalculateQuality()
    {
        return $this->getQuality();
    }

}
