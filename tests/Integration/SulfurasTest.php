<?php

declare(strict_types=1);

namespace Tests;

use Generator;
use GildedRose\Models\Item;
use PHPUnit\Framework\TestCase;
use GildedRose\Client\GildedRose;

class SulfurasTest extends TestCase
{
    /**
    * @dataProvider dataProvider
    */
    public function testSulfuras(array $stats, array $expected): void
    {
        $gildedRose = new GildedRose([new Item('Sulfuras, Hand of Ragnaros', $stats[0], $stats[1])]);
        $gildedRose->updateQuality();
        $this->assertEquals('Sulfuras, Hand of Ragnaros', $gildedRose->items[0]->name);
        $this->assertEquals($expected[0], $gildedRose->items[0]->sell_in);
        $this->assertEquals($expected[1], $gildedRose->items[0]->quality);
    }
    public function dataProvider(): Generator
    {
        yield 'SulfurasUpdate' => [[10,50], [10, 80]];
        yield 'SulfurasSellinZeroUpdate' => [[0,10], [0, 80]];
        yield 'SulfurasSellinBelowZeroUpdate' => [[-5,-5], [-5, 80]];
        yield 'SulfurasSellinMaxQualityUpdate' => [[0,80], [0, 80]];
    }
}