<?php

declare(strict_types=1);

namespace Tests;

use Generator;
use GildedRose\Models\Item;
use PHPUnit\Framework\TestCase;
use GildedRose\Client\GildedRose;

class VestTest extends TestCase
{
    /**
    * @dataProvider dataProvider
    */
    public function testVest(array $stats, array $expected): void
    {
        $gildedRose = new GildedRose([new Item('+5 Dexterity Vest', $stats[0], $stats[1])]);
        $gildedRose->updateQuality();
        $this->assertEquals('+5 Dexterity Vest', $gildedRose->items[0]->name);
        $this->assertEquals($expected[0], $gildedRose->items[0]->sell_in);
        $this->assertEquals($expected[1], $gildedRose->items[0]->quality);
    }
    public function dataProvider(): Generator
    {
        yield 'VestUpdate' => [[15,5], [14, 4]];
        yield 'VestSellinBelowZeroUpdate' => [[-2,5], [-3, 3]];
        yield 'VestQualityZeroUpdate' => [[-2,0], [-3, 0]];
    }
}