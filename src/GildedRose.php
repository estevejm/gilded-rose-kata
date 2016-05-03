<?php

class GildedRose
{
    /**
     * @param AdaptedItem $startItem
     * @return AdaptedItem
     */
    public function endDay(AdaptedItem $startItem)
    {
        return $startItem->endDay();
    }
}
