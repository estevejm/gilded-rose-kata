<?php

class GildedRoseTest extends PHPUnit_Framework_TestCase
{
    public function testItemQualityDecreasesWhenDayPasses()
    {
        $gildedRose = new GildedRose();

        $startItem = new Item('normal', 20, 50);

        $endItem = $gildedRose->endDay($startItem);

        $this->assertEquals(49, $endItem->quality);
    }

    public function testItemSellInDecreasesWhenDayPasses()
    {
        $gildedRose = new GildedRose();

        $startItem = new Item('normal', 20, 50);

        $endItem = $gildedRose->endDay($startItem);

        $this->assertEquals(19, $endItem->sell_in);
    }

    public function testQualityDegradesTwiceAsFastWhenSellDayPassed()
    {
        $gildedRose = new GildedRose();

        $startItem = new Item('normal', 0, 50);

        $endItem = $gildedRose->endDay($startItem);

        $this->assertEquals(48, $endItem->quality);
    }
}
