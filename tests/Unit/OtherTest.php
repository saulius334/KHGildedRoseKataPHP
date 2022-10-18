<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Models\Item;
use GildedRose\Client\GildedRose;
use PHPUnit\Framework\TestCase;

class OtherTest extends TestCase
{
    public function testConjuredUpdate(): void {
        $items = [new Item('Whatever', 50, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Whatever');
        $this->assertEquals($items[0]->sell_in,49);
        $this->assertEquals($items[0]->quality,49);
    }
    public function testConjuredSellinZeroUpdate(): void {
        $items = [new Item('YOLO dude', 0, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'YOLO dude');
        $this->assertEquals($items[0]->sell_in,-1);
        $this->assertEquals($items[0]->quality,48);
    }
    public function testConjuredSellinBelowZeroUpdate(): void {
        $items = [new Item('Kilo health?', -5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Kilo health?');
        $this->assertEquals($items[0]->sell_in,-6);
        $this->assertEquals($items[0]->quality,48);
    }
    public function testConjuredQualityZeroUpdate(): void {
        $items = [new Item('Kas skaito tas mldc', -5, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Kas skaito tas mldc');
        $this->assertEquals($items[0]->sell_in,-6);
        $this->assertEquals($items[0]->quality,-2);
    }
    public function testConjuredQualityOverMaxUpdate(): void {
        $items = [new Item('Kas skaito tas mldc', 50, 99999)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Kas skaito tas mldc');
        $this->assertEquals($items[0]->sell_in,49);
        $this->assertEquals($items[0]->quality,50);
    }
}