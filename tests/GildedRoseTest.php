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
