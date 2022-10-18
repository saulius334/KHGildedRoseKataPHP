<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Models\Item;
use GildedRose\Client\GildedRose;
use PHPUnit\Framework\TestCase;

class AgedBrieTest extends TestCase
{
    public function testBrieUpdate(): void {
        $items = [new Item('Aged Brie', 15, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,14);
        $this->assertEquals($items[0]->quality,21);
    }
    public function testBrieSellinZeroUpdate(): void {
        $items = [new Item('Aged Brie', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,-1);
        $this->assertEquals($items[0]->quality,12);
    }
    public function testBrieSellinBelowZeroUpdate(): void {
        $items = [new Item('Aged Brie', -10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,-11);
        $this->assertEquals($items[0]->quality,12);
    }
    public function testBrieSellinMaxQualityUpdate(): void {
        $items = [new Item('Aged Brie', 2, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,1);
        $this->assertEquals($items[0]->quality,50);
    }
    public function testBrieSellin49QualityUpdate(): void {
        $items = [new Item('Aged Brie', 5, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,4);
        $this->assertEquals($items[0]->quality,50);
    }
    public function testBrieSellinBelowZeroMaxQualityUpdate(): void {
        $items = [new Item('Aged Brie', -5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,-6);
        $this->assertEquals($items[0]->quality,50);
    }
}