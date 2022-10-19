<?php

declare(strict_types=1);

namespace GildedRose\Client;

use GildedRose\Models\Other;
use GildedRose\Models\AgedBrie;
use GildedRose\Models\Conjured;
use GildedRose\Models\Sulfuras;
use GildedRose\Models\Backstage;


final class GildedRose
{

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        $inventory = [
            new Other(),
            new AgedBrie(),
            new Backstage(),
            new Sulfuras(),
            new Conjured(),
        ];
        foreach ($this->items as $item) {
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in--;
            }
            if ($item->name == 'Aged Brie') {
                $inventory[1]->updateQuality($item);
            } else if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                $inventory[2]->updateQuality($item);
            } else if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                $inventory[3]->updateQuality($item);
            } else if ($item->name == 'Conjured Mana Cake') {
                $inventory[4]->updateQuality($item);
            } else {
                $inventory[0]->updateQuality($item);
            }
        }
    }
}
