<?php

declare(strict_types=1);

namespace GildedRose\Models;

use GildedRose\Interfaces\ItemInterface;
use GildedRose\Interfaces\LegendaryItem;

class Sulfuras extends LegendaryItem implements ItemInterface  {
    public function updateItemQuality(Item $item): self
    {
        return $this;
    }
}