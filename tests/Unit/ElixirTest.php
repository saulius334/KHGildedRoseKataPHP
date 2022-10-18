<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Models\Item;
use GildedRose\Client\GildedRose;
use PHPUnit\Framework\TestCase;

class ElixirTest extends TestCase
{
    public function testElixirUpdate(): void {
        $items = [new Item('Elixir of the Mongoose', 15, 5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Elixir of the Mongoose');
        $this->assertEquals($items[0]->sell_in,14);
        $this->assertEquals($items[0]->quality,4);
    }
    public function testElixirSellinBelowZeroUpdate(): void {
        $items = [new Item('Elixir of the Mongoose', -2, 5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Elixir of the Mongoose');
        $this->assertEquals($items[0]->sell_in,-3);
        $this->assertEquals($items[0]->quality,3);
    }
    public function testElixirQualityZeroUpdate(): void {
        $items = [new Item('Elixir of the Mongoose', -2, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Elixir of the Mongoose');
        $this->assertEquals($items[0]->sell_in,-3);
        $this->assertEquals($items[0]->quality,-2);
    }
}