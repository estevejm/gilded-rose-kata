<?php

class GildedRose
{
    /**
     * @param Item $startItem
     * @return Item
     */
    public function endDay(Item $startItem)
    {
        $endItem = new Item($startItem->name, $startItem->sell_in - 1, $startItem->quality - 1);

        return $endItem;
    }
}
