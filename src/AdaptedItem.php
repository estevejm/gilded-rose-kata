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
    public function __construct(Item $item)
    {
        $this->item = $item;
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
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
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

        return new Item($this->item->name, $newSellIn, $newQuality);
    }
}
