<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Models\Item;
use GildedRose\Client\GildedRose;
use PHPUnit\Framework\TestCase;

class ConjuredTest extends TestCase
{
    public function testConjuredUpdate(): void {
        $items = [new Item('Conjured Mana Cake', 50, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Conjured Mana Cake');
        $this->assertEquals($items[0]->sell_in,49);
        $this->assertEquals($items[0]->quality,48);
    }
    public function testConjuredSellinZeroUpdate(): void {
        $items = [new Item('Conjured Mana Cake', 0, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Conjured Mana Cake');
        $this->assertEquals($items[0]->sell_in,-1);
        $this->assertEquals($items[0]->quality,46);
    }
    public function testConjuredSellinBelowZeroUpdate(): void {
        $items = [new Item('Conjured Mana Cake', -5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Conjured Mana Cake');
        $this->assertEquals($items[0]->sell_in,-6);
        $this->assertEquals($items[0]->quality,46);
    }
    public function testConjuredQualityZeroUpdate(): void {
        $items = [new Item('Conjured Mana Cake', -5, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Conjured Mana Cake');
        $this->assertEquals($items[0]->sell_in,-6);
        $this->assertEquals($items[0]->quality,-4);
    }
}