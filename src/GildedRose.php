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

        if ($startItem->sell_in == 0) {
            $endItem = new Item($startItem->name, $startItem->sell_in - 1, $startItem->quality - 2);
        }

        return $endItem;
    }
}
