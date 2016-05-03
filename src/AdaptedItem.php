<?php

class AdaptedItem
{
    /**
     * @var Item
     */
    private $item;

    /**
     * @param Item $item
     */
    public function __construct(Item $item, $name, $sellIn, $quality)
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

        $newSellIn = $this->item->sell_in - 1;
        $newQuality = $this->item->quality + $qualityMultiplier;

        if ($this->item->sell_in == 0) {
            $newQuality += $qualityMultiplier;
        }

        if ($newQuality < 0) {
            $newQuality = 0;
        }

        $newItem = new Item($this->item->name, $newSellIn, $newQuality);

        return new AdaptedItem($newItem, $this->item->name, $newSellIn, $newQuality);
    }
}
