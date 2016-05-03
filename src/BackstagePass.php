<?php

class BackstagePass extends AdaptedItem
{
    protected function recalculateQuality()
    {
        return $this->getQuality() + 1;
    }
}
