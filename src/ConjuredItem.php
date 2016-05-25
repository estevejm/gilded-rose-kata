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
        $newSellIn = $this->decrementSellInDays();
        $newQuality = $this->recalculateQuality();

        return new AdaptedItem($this->item->getName(), $newSellIn, $newQuality);
    }

    protected function getQualityDiff()
    {
        return 2 * $this->item->getQualityDiff();
    }
}
