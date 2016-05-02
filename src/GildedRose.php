<?php

class GildedRose
{
    /**
     * @param Item $startItem
     * @return Item
     */
    public function endDay(Item $startItem)
    {
        $newSellIn = $startItem->sell_in - 1;
        $newQuality = $startItem->quality - 1;

        if ($startItem->sell_in == 0) {
            $newQuality--;
        }

        return new Item($startItem->name, $newSellIn, $newQuality);
    }
}
