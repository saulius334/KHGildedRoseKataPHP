<?php

namespace GildedRose;

use GildedRose\Interfaces\ItemInterface;

class Sulfuras implements ItemInterface {
    public function updateQuality(Item $item): void
    {
        $item->sell_in++;
        $item->quality = 80;
    }

}