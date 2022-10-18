<?php

declare(strict_types=1);

namespace GildedRose\Interfaces;

use GildedRose\Models\Item;

interface ItemInterface {
    public function updateQuality(Item $item): void;
}