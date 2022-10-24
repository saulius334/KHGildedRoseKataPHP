<?php

declare(strict_types=1);

namespace GildedRose\Factories;

use GildedRose\Interfaces\ItemFactoryInterface;
use GildedRose\Interfaces\ItemInterface;
use GildedRose\Interfaces\LegendaryItem;
use GildedRose\Models\Item;
use GildedRose\Models\Other;
use GildedRose\Models\AgedBrie;
use GildedRose\Models\Conjured;
use GildedRose\Models\Sulfuras;
use GildedRose\Models\Backstage;

class ItemFactory implements ItemFactoryInterface {
    public function createCurrentItem(Item $item): ItemInterface|LegendaryItem
    {
        return match ($item->name) {
            'Aged Brie' => new AgedBrie(),
            'Backstage passes to a TAFKAL80ETC concert' => new Backstage(),
            'Sulfuras, Hand of Ragnaros' => new Sulfuras($item),
            'Conjured Mana Cake' => new Conjured(),
            default => new Other(),
        };
    }
}