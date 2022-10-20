<?php

declare(strict_types=1);

namespace GildedRose\Interfaces;

use GildedRose\Models\Item;

interface ItemFactoryInterface {
    public function createCurrentItem(Item $item): mixed;
}