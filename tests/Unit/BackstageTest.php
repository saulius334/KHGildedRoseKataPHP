<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Models\Item;
use GildedRose\Client\GildedRose;
use PHPUnit\Framework\TestCase;

class BackstageTest extends TestCase
{
    public function testBackstageUpdate(): void {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 20, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,19);
        $this->assertEquals($items[0]->quality,16);
    }
    public function testBackstageSellinZeroUpdate(): void {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,-1);
        $this->assertEquals($items[0]->quality,0);
    }
    public function testBackstageSellinBelowZeroUpdate(): void {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', -10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,-11);
        $this->assertEquals($items[0]->quality,0);
    }
    public function testBackstageSellinMaxQualityUpdate(): void {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 2, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,1);
        $this->assertEquals($items[0]->quality,50);
    }
    public function testBackstageSellin49QualityUpdate(): void {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,4);
        $this->assertEquals($items[0]->quality,50);
    }
    public function testBackstageSellinBelowZeroMaxQualityUpdate(): void {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', -5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,-6);
        $this->assertEquals($items[0]->quality,0);
    }
}