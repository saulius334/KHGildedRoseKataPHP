<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Models\Item;
use GildedRose\Client\GildedRose;
use PHPUnit\Framework\TestCase;

class VestTest extends TestCase
{
    public function testVestUpdate(): void {
        $items = [new Item('+5 Dexterity Vest', 15, 5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'+5 Dexterity Vest');
        $this->assertEquals($items[0]->sell_in,14);
        $this->assertEquals($items[0]->quality,4);
    }
    public function testVestSellinBelowZeroUpdate(): void {
        $items = [new Item('+5 Dexterity Vest', -2, 5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'+5 Dexterity Vest');
        $this->assertEquals($items[0]->sell_in,-3);
        $this->assertEquals($items[0]->quality,3);
    }
    public function testVestQualityZeroUpdate(): void {
        $items = [new Item('+5 Dexterity Vest', -2, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'+5 Dexterity Vest');
        $this->assertEquals($items[0]->sell_in,-3);
        $this->assertEquals($items[0]->quality,-2);
    }
}