<?php

class AdaptedItem
{
    /**
     * @var Item
     */
    private $item;

    /**
     * @param $name
     * @param $sellIn
     * @param $quality
     */
    public function __construct($name, $sellIn, $quality)
    {
        $this->item = new Item($name, $sellIn, $quality);
    }

    /**
     * @return int
     */
    public function getSellInDays()
    {
        return $this->item->sell_in;
    }

    /**
     * @return int
     */
    public function getQuality()
    {
        return $this->item->quality;
    }

    /**
     * @return AdaptedItem
     */
    public function endDay()
    {
        $newSellIn = $this->decrementSellInDays();
        $newQuality = $this->recalculateQuality();

        return new AdaptedItem($this->item->name, $newSellIn, $newQuality);
    }

    /**
     * @return int
     */
    private function decrementSellInDays()
    {
        return $this->getSellInDays() - 1;
    }

    /**
     * @return int
     */
    protected function recalculateQuality()
    {
        $newQuality = $this->getQuality() - 1;

        if ($this->getSellInDays() == 0) {
            $newQuality--;
        }

        if ($newQuality < 0) {
            return 0;
        }

        return $newQuality;
    }
}
