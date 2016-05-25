<?php

class ConjuredItem extends AdaptedItem
{
    /**
     * @var AdaptedItem
     */
    private $item;

    /**
     * @param AdaptedItem $item
     */
    public function __construct(AdaptedItem $item)
    {
        $this->item = $item;
    }

    public function getSellInDays()
    {
        return $this->item->getSellInDays();
    }

    public function getQuality()
    {
        return $this->item->getQuality();
    }

    public function endDay()
    {
        return $this->item->endDay();
    }
}
