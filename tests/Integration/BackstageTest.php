<?php

declare(strict_types=1);

namespace Tests;

use Generator;
use GildedRose\Models\Item;
use PHPUnit\Framework\TestCase;
use GildedRose\Client\GildedRose;

class BackstageTest extends TestCase
{
    /**
    * @dataProvider dataProvider
    */
    public function testBackstage(array $stats, array $expected): void
    {
        $gildedRose = new GildedRose([new Item('Backstage passes to a TAFKAL80ETC concert', $stats[0], $stats[1])]);
        $gildedRose->updateQuality();
        $this->assertEquals('Backstage passes to a TAFKAL80ETC concert', $gildedRose->items[0]->name);
        $this->assertEquals($expected[0], $gildedRose->items[0]->sell_in);
        $this->assertEquals($expected[1], $gildedRose->items[0]->quality);
    }
    public function dataProvider(): Generator
    {
        yield 'BackstageUpdate' => [[20,15], [19, 16]];
        yield 'BackstageSellinZeroUpdate' => [[0,10], [-1, 0]];
        yield 'BackstageSellinBelowZeroUpdate' => [[-10,10], [-11, 0]];
        yield 'BackstageSellinMaxQualityUpdate' => [[2,50], [1, 50]];
        yield 'BackstageSellin49QualityUpdate' => [[5,49], [4, 50]];
        yield 'BackstageSellinBelowZeroMaxQualityUpdate' => [[-5,50], [-6, 0]];
    }
}