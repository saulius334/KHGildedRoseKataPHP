<?php

declare(strict_types=1);

namespace GildedRose\Interfaces;

use GildedRose\Models\Item;
use GildedRose\Interfaces\LegendaryItem;

interface ItemInterface {
    public function updateItemQuality(Item $item): self;
    // public function sellInMinus(Item $item) {
    //     if (!$item->legendary) {
    //         $item->sell_in--;
    //     }
    // }
}