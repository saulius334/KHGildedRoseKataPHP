<?php

declare(strict_types=1);

namespace GildedRose\Factories;

use GildedRose\Models\Item;
use GildedRose\Models\Other;
use GildedRose\Models\AgedBrie;
use GildedRose\Models\Conjured;
use GildedRose\Models\Sulfuras;
use GildedRose\Models\Backstage;

class InventoryFactory {
    public function createInventory(Item $item): mixed
    {
        return match ($item->name) {
            'Aged Brie' => new AgedBrie(),
            'Backstage passes to a TAFKAL80ETC concert' => new Backstage(),
            'Sulfuras, Hand of Ragnaros' => new Sulfuras(),
            'Conjured Mana Cake' => new Conjured(),
            default => new Other(),
        };
    }
}