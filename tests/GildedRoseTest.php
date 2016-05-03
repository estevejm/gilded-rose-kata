<?php

class GildedRoseTest extends PHPUnit_Framework_TestCase
{

    public function testItemSellInDecreasesWhenDayPasses()
    {
        $startItem = new AdaptedItem('normal', 20, 50);

        $endItem = $startItem->endDay();

        $this->assertEquals(19, $endItem->getSellInDays());
    }

    /**
     * @dataProvider endDayQualityDataProvider
     */
    public function testEndDayQuality(AdaptedItem $startItem, $expectedQuality)
    {
        $endItem = $startItem->endDay();

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
            'quality of backstage pass increases when concert is in more than 10 days' => [
                'item' => new BackstagePass(15, 30),
                'expectedQuality' => 31,
            ],
            'quality of backstage pass increases by 2when concert is in 10 days' => [
                'item' => new BackstagePass(10, 30),
                'expectedQuality' => 32,
            ],
            'quality of backstage pass increases by 2 when concert is in less than 10 days' => [
                'item' => new BackstagePass(9, 30),
                'expectedQuality' => 32,
            ],
            'quality of backstage pass increases by 3 when concert is in 5 days' => [
                'item' => new BackstagePass(5, 30),
                'expectedQuality' => 33,
            ],
            'quality of backstage pass increases by 3 when concert is in less than 5 days' => [
                'item' => new BackstagePass(4, 30),
                'expectedQuality' => 33,
            ],
            'quality of backstage pass drops to 0 after the concert' => [
                'item' => new BackstagePass(0, 30),
                'expectedQuality' => 0,
            ],
            'sell date passed long time ago and aged brie quality still increases twice as fast' => [
                'item' => new AgedBrie(-100, 20),
                'expectedQuality' => 22,
            ],
            'sell date passed long time ago and backstage pass quality still is 0' => [
                'item' => new BackstagePass(-100, 20),
                'expectedQuality' => 0,
            ],
            'backstage pass quality is never  more than 50' => [
                'item' => new BackstagePass(10, 50),
                'expectedQuality' => 50,
            ],
        ];
    }
}
