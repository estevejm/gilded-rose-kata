<?php

class GildedRoseTest extends PHPUnit_Framework_TestCase
{

    public function testItemSellInDecreasesWhenDayPasses()
    {
        $gildedRose = new GildedRose();

        $startItem = new AdaptedItem(new Item('normal', 20, 50), 'normal', 20, 50);

        $endItem = $gildedRose->endDay($startItem);

        $this->assertEquals(19, $endItem->getSellInDays());
    }

    /**
     * @dataProvider endDayQualityDataProvider
     */
    public function testEndDayQuality($startItem, $expectedQuality)
    {
        $gildedRose = new GildedRose();

        $endItem = $gildedRose->endDay($startItem);

        $this->assertEquals($expectedQuality, $endItem->getQuality());
    }

    public function endDayQualityDataProvider()
    {
        return [
            'item quality decreases when day ends' => [
                'item' => new AdaptedItem(new Item('normal', 20, 50), 'normal', 20, 50),
                'expectedQuality' => 49,
            ],
            'sell date passed item quality decreases twice as fast' => [
                'item' => new AdaptedItem(new Item('normal', 0, 50), 'normal', 0, 50),
                'expectedQuality' => 48,
            ],
            'item quality is never negative' => [
                'item' => new AdaptedItem(new Item('normal', 0, 0), 'normal', 0, 0),
                'expectedQuality' => 0,
            ],
            'aged brie item increases quality' => [
                'item' => new AdaptedItem(new Item('Aged Brie', 8, 10), 'Aged Brie', 8, 10),
                'expectedQuality' => 11,
            ],
        ];
    }
}
