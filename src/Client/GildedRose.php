<?php

declare(strict_types=1);

namespace GildedRose\Client;

use GildedRose\Factories\ItemFactory;

final class GildedRose
{

    public function __construct(array $items)
    {
        $this->items = $items;
    }
    
    public function updateQuality(): void
    {
        $currentItem = new ItemFactory();
        foreach ($this->items as $item) {
            if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in--;
            }
            $itemToUpdate = $currentItem->createCurrentItem($item);
            // $itemToUpdate->sellInMinus($item);
            $itemToUpdate->updateItemQuality($item);
        }
    }
}
