<?php

declare(strict_types=1);

namespace Tests;

use Generator;
use GildedRose\Models\Item;
use PHPUnit\Framework\TestCase;
use GildedRose\Client\GildedRose;

class ElixirTest extends TestCase
{
    /**
    * @dataProvider dataProvider
    */
    public function testElixir(array $stats, array $expected): void
    {
        $gildedRose = new GildedRose([new Item('Elixir of the Mongoose', $stats[0], $stats[1])]);
        $gildedRose->updateQuality();
        $this->assertEquals('Elixir of the Mongoose', $gildedRose->items[0]->name);
        $this->assertEquals($expected[0], $gildedRose->items[0]->sell_in);
        $this->assertEquals($expected[1], $gildedRose->items[0]->quality);
    }
    public function dataProvider(): Generator
    {
        yield 'ElixirUpdate' => [[15,5], [14, 4]];
        yield 'ElixirSellinBelowZeroUpdate' => [[-2,5], [-3, 3]];
        yield 'ElixirQualityZeroUpdate' => [[-2,0], [-3, 0]];
    }
}