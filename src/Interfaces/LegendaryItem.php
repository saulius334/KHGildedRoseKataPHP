<?php

declare(strict_types=1);

namespace GildedRose\Interfaces;

abstract class LegendaryItem {
    public function __construct($item) {
        $item->legendary = true;
        $item->quality = 80;
    }
    // public function sellInDontMove() {
        
    // }
}