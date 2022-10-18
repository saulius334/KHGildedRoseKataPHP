<?php

declare(strict_types=1);

namespace GildedRose\Interfaces;

use GildedRose\Item;

interface ItemInterface {
    public function updateQuality(Item $item): void;
}