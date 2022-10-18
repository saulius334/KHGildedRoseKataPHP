<?php

namespace GildedRose;

use GildedRose\Interfaces\ItemInterface;

class Conjured implements ItemInterface {
    public function updateQuality(Item $item): void
    {
        $item->sell_in--;
        $item->quality -= 2;
        if ($item->sell_in <= 0) {
            $item->quality -= 2;
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

}