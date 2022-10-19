<?php

declare(strict_types=1);

namespace GildedRose\Models;

use GildedRose\Interfaces\ItemInterface;

class Sulfuras implements ItemInterface {
    public function updateQuality(Item $item): void
    {
        $item->quality = 80;
    }

}