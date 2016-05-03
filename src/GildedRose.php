<?php

class GildedRose
{
    /**
     * @param Item $startItem
     * @return Item
     */
    public function endDay(Item $startItem)
    {
        $startOfDayItem = new AdaptedItem($startItem);

        $endOfDayItem = $startOfDayItem->endDay();

        return $endOfDayItem->getItem();
    }
}
