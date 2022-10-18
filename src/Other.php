<?php

namespace GildedRose;

use GildedRose\Interfaces\ItemInterface;

class Other implements ItemInterface {
    public function updateQuality(Item $item): void
    {
        $item->quality--;
        $item->sell_in--;
        if ($item->sell_in <= 0) {
            $item->quality--;
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

}