<?php

declare(strict_types=1);

namespace Tests;

use Generator;
use GildedRose\Models\Item;
use GildedRose\Client\GildedRose;
use PHPUnit\Framework\TestCase;

class AgedBrieTest extends TestCase
{
    /**
    * @dataProvider dataProvider
    */
    public function testAgedBrie(array $stats, array $expected): void
    {
        $gildedRose = new GildedRose([new Item('Aged Brie', $stats[0], $stats[1])]);
        $gildedRose->updateQuality();
        $this->assertEquals('Aged Brie', $gildedRose->items[0]->name);
        $this->assertEquals($expected[0], $gildedRose->items[0]->sell_in);
        $this->assertEquals($expected[1], $gildedRose->items[0]->quality);
    }
    public function dataProvider(): Generator
    {
        yield 'BrieUpdate' => [[15,20], [14, 21]];
        yield 'BrieSellinZeroUpdate' => [[0,10], [-1, 12]];
        yield 'BrieSellinBelowZeroUpdate' => [[-10,10], [-11, 12]];
        yield 'BrieSellinMaxQualityUpdate' => [[2,50], [1, 50]];
        yield 'BrieSellin49QualityUpdate' => [[5,49], [4, 50]];
        yield 'BrieSellinBelowZeroMaxQualityUpdate' => [[-5,50], [-6, 50]];
    }
}