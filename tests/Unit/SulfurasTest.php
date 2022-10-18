<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Models\Item;
use GildedRose\Client\GildedRose;
use PHPUnit\Framework\TestCase;

class SulfurasTest extends TestCase
{
    public function testSulfurasUpdate(): void {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 10, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->sell_in,10);
        $this->assertEquals($items[0]->quality,80);
    }
    public function testSulfurasSellinZeroUpdate(): void {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->sell_in,0);
        $this->assertEquals($items[0]->quality,80);
    }
    public function testSulfurasSellinBelowZeroUpdate(): void {
        $items = [new Item('Sulfuras, Hand of Ragnaros', -5, -5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->sell_in,-5);
        $this->assertEquals($items[0]->quality,80);
    }
    public function testSulfurasSellinMaxQualityUpdate(): void {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->sell_in,0);
        $this->assertEquals($items[0]->quality,80);
    }
}