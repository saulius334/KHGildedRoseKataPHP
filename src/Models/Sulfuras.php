<?php

declare(strict_types=1);

namespace GildedRose\Models;

use GildedRose\Interfaces\ItemInterface;

class Sulfuras implements ItemInterface {
    public function updateItemQuality(Item $item): self
    {
        $item->quality = 80;
        return $this;
    }

}