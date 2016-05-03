<?php

class AdaptedItem
{
    /**
     * @var Item
     */
    private $item;

    /**
     * @param $name
     * @param $sellIn
     * @param $quality
     */
    public function __construct($name, $sellIn, $quality)
    {
        $this->item = new Item($name, $sellIn, $quality);
    }

    /**
     * @return int
     */
    public function getSellInDays()
    {
        return $this->item->sell_in;
    }

    /**
     * @return int
     */
    public function getQuality()
    {
        return $this->item->quality;
    }

    /**
     * @return AdaptedItem
     */
    public function endDay()
    {
        $qualityMultiplier = $this->item->name === "Aged Brie" ? 1 : -1;

        $newSellIn = $this->decrementSellInDays();

        $newQuality = $this->getQuality() + $qualityMultiplier;

        if ($this->getSellInDays() == 0) {
            $newQuality += $qualityMultiplier;
        }

        if ($newQuality < 0) {
            $newQuality = 0;
        }

        return new AdaptedItem($this->item->name, $newSellIn, $newQuality);
    }

    /**
     * @return int
     */
    private function decrementSellInDays()
    {
        return $this->getSellInDays() - 1;
    }
}
