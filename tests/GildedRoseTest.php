<?php

class GildedRoseTest extends PHPUnit_Framework_TestCase
{
    public function testItemSellInAndQualityDecreases()
    {
        $gildedRose = new GildedRose();

        $startItem = new Item('normal', 20, 50);

        $endItem = $gildedRose->endDay($startItem);

        $this->assertLessThan($startItem->sell_in, $endItem->sell_in);
        $this->assertLessThan($startItem->quality, $endItem->quality);
    }
}
