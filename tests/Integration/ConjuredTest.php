<?php

declare(strict_types=1);

namespace Tests;

use Generator;
use GildedRose\Models\Item;
use PHPUnit\Framework\TestCase;
use GildedRose\Client\GildedRose;

class ConjuredTest extends TestCase
{
    /**
    * @dataProvider dataProvider
    */
    public function testConjured(array $stats, array $expected): void
    {
        $gildedRose = new GildedRose([new Item('Conjured Mana Cake', $stats[0], $stats[1])]);
        $gildedRose->updateQuality();
        $this->assertEquals('Conjured Mana Cake', $gildedRose->items[0]->name);
        $this->assertEquals($expected[0], $gildedRose->items[0]->sell_in);
        $this->assertEquals($expected[1], $gildedRose->items[0]->quality);
    }
    public function dataProvider(): Generator
    {
        yield 'ConjuredUpdate' => [[50,50], [49, 48]];
        yield 'ConjuredSellinZeroUpdate' => [[0,50], [-1, 46]];
        yield 'ConjuredSellinBelowZeroUpdate' => [[-5,50], [-6, 46]];
        yield 'ConjuredQualityZeroUpdate' => [[-5,0], [-6, 0]];
        yield 'ConjuredMaxQualityUpdate' => [[50,99999], [49, 50]];
    }
}