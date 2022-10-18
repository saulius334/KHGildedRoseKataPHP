<?php

namespace GildedRose;

use GildedRose\Interfaces\ItemInterface;

class Backstage implements ItemInterface {
    public function updateQuality(Item $item): void
    {
        $item->quality++;
        if ($item->sell_in <= 10) {
            $item->quality++;
        }
        if ($item->sell_in <= 5) {
            $item->quality++;
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
        if ($item->sell_in <= 0) {
            $item->quality = 0;
        }
    }

}