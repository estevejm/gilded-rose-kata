<?php

class AdaptedItem
{
    const MIN_QUALITY = 0;
    const MAX_QUALITY = 50;

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
     * @return string
     */
    public function getName()
    {
        return $this->item->name;
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

        if ($newQuality < self::MIN_QUALITY) {
            $newQuality = self::MIN_QUALITY;
        } elseif ($newQuality > self::MAX_QUALITY) {
            $newQuality = self::MAX_QUALITY;
        }

        return new AdaptedItem($this->getName(), $newSellIn, $newQuality);
    }

    /**
     * @return int
     */
    protected function decrementSellInDays()
    {
        return $this->getSellInDays() - 1;
    }

    /**
     * @return int
     */
    protected function recalculateQuality()
    {
        return $this->getQuality() + $this->getQualityDiff();
    }

    /**
     * @return int
     */
    protected function getQualityDiff()
    {
        if ($this->hasSellDayPassed()) {
            return -2;
        }

        return -1;
    }

    /**
     * @return bool
     */
    protected function hasSellDayPassed()
    {
        return $this->getSellInDays() <= 0;
    }
}
