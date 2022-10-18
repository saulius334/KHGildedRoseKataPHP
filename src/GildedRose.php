<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Other;
use GildedRose\AgedBrie;
use GildedRose\Conjured;
use GildedRose\Sulfuras;
use GildedRose\Backstage;


final class GildedRose
{
    
    public function __construct(array $items)
    {
        $this->items = $items;
    }
    
    public function updateQuality(): void
    {
        $inventory = [
            new AgedBrie(),
            new Backstage(),
            new Sulfuras(),
            new Other(),
            new Conjured(),
        ];
        foreach ($this->items as $item) {
            if ($item->name == 'Aged Brie') {
                $agedBrie = new AgedBrie;
                $inventory[0]->updateQuality($item);
            } else if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                $backstage = new Backstage;
                $backstage->updateQuality($item);
            } else if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                $sulfuras = new Sulfuras;
                $sulfuras->updateQuality($item);
            } else if ($item->name == 'Conjured Mana Cake') {
                $conjured = new Conjured;
                $conjured->updateQuality($item);
            } else {
                $other = new Other;
                $other->updateQuality($item);
            }
        }
    //     foreach ($this->items as $item) {
    //         if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
    //             if ($item->quality > 0) {
    //                 if ($item->name != 'Sulfuras, Hand of Ragnaros') {
    //                     $item->quality = $item->quality - 1;
    //                 }
    //             }
    //         } else {
    //             if ($item->quality < 50) {
    //                 $item->quality = $item->quality + 1;
    //                 if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
    //                     if ($item->sell_in < 11) {
    //                         if ($item->quality < 50) {
    //                             $item->quality = $item->quality + 1;
    //                         }
    //                     }
    //                     if ($item->sell_in < 6) {
    //                         if ($item->quality < 50) {
    //                             $item->quality = $item->quality + 1;
    //                         }
    //                     }
    //                 }
    //             }
    //         }

    //         if ($item->name != 'Sulfuras, Hand of Ragnaros') {
    //             $item->sell_in = $item->sell_in - 1;
    //         }

    //         if ($item->sell_in < 0) {
    //             if ($item->name != 'Aged Brie') {
    //                 if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
    //                     if ($item->quality > 0) {
    //                         if ($item->name != 'Sulfuras, Hand of Ragnaros') {
    //                             $item->quality = $item->quality - 1;
    //                         }
    //                     }
    //                 } else {
    //                     $item->quality = $item->quality - $item->quality;
    //                 }
    //             } else {
    //                 if ($item->quality < 50) {
    //                     $item->quality = $item->quality + 1;
    //                 }
    //             }
    //         }
    //     }
    }
}