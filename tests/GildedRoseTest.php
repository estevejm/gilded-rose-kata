<?php

class GildedRoseTest extends PHPUnit_Framework_TestCase
{

    public function testItemSellInDecreasesWhenDayPasses()
    {
        $gildedRose = new GildedRose();

        $startItem = new AdaptedItem('normal', 20, 50);

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
                'item' => new AdaptedItem('normal', 20, 50),
                'expectedQuality' => 49,
            ],
            'sell date passed item quality decreases twice as fast' => [
                'item' => new AdaptedItem('normal', 0, 50),
                'expectedQuality' => 48,
            ],
            'sell date passed long time ago and item quality still decreases twice as fast' => [
                'item' => new AdaptedItem('normal', -100, 50),
                'expectedQuality' => 48,
            ],
            'item quality is never negative' => [
                'item' => new AdaptedItem('normal', 0, 0),
                'expectedQuality' => 0,
            ],
            'aged brie item increases quality' => [
                'item' => new AgedBrie(8, 10),
                'expectedQuality' => 11,
            ],
            'quality of an item is never more than 50' => [
                'item' => new AdaptedItem('normal', 1, 50),
                'expectedQuality' => 49,
            ],
            'quality of a aged brie is never more than 50' => [
                'item' => new AgedBrie(8, 50),
                'expectedQuality' => 50,
            ],
            'quality of sulfuras is always 80' => [
                'item' => new Sulfuras(),
                'expectedQuality' => 80,
            ],
        ];
    }
}
