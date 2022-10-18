<?php

declare(strict_types=1);

namespace GildedRose\Models;

use GildedRose\Interfaces\ItemInterface;

class Conjured implements ItemInterface {
    public function updateQuality(Item $item): void
    {
        $item->quality -= 2;
        if ($item->sell_in <= 0) {
            $item->quality -= 2;
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

}