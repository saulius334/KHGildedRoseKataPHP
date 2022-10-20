<?php

declare(strict_types=1);

namespace GildedRose\Models;

use GildedRose\Interfaces\ItemInterface;

class Other implements ItemInterface {
    public function updateQuality(Item $item): self
    {
        $item->quality--;
        if ($item->sell_in <= 0) {
            $item->quality--;
        }
        if ($item->quality > 50) {
            $item->quality = 50;
        }
        return $this;
    }

}