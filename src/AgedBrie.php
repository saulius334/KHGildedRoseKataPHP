<?php

namespace GildedRose;

use GildedRose\Interfaces\ItemInterface;

class AgedBrie implements ItemInterface {
    public function updateQuality(Item $item): void
    {
        $item->sell_in--;
        $item->quality++;
        if ($item->sell_in <= 0) {
            $item->quality++;
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

}