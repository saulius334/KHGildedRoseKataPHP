<?php

declare(strict_types=1);

namespace GildedRose\Client;

use GildedRose\Factories\InventoryFactory;

final class GildedRose
{

    public function __construct(array $items)
    {
        $this->items = $items;
    }
    
    public function updateQuality(): void
    {
        $inventory = new InventoryFactory();
        foreach ($this->items as $item) {
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in--;
            }
            $itemToUpdate = $inventory->createInventory($item);
            $itemToUpdate->updateQuality($item);
        }
    }
}
