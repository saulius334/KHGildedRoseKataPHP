<?php

namespace GildedRose;

use GildedRose\Interfaces\ItemInterface;

class Sulfuras implements ItemInterface {
    public function updateQuality(Item $item): void
    {
        $item->quality = 80;
    }

}