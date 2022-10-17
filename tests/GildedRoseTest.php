<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }
    //Aged Brie start
    public function testBrieUpdate() {
        $items = [new Item('Aged Brie', 15, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->quality,21);
        $this->assertEquals($items[0]->sell_in,14);
    }
    public function testBrieSellinZeroUpdate() {
        $items = [new Item('Aged Brie', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->quality,12);
        $this->assertEquals($items[0]->sell_in,-1);
    }
    public function testBrieSellinBelowZeroUpdate() {
        $items = [new Item('Aged Brie', -10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->quality,12);
        $this->assertEquals($items[0]->sell_in,-11);
    }
    public function testBrieSellinMaxQualityUpdate() {
        $items = [new Item('Aged Brie', 2, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,1);
    }
    public function testBrieSellin49QualityUpdate() {
        $items = [new Item('Aged Brie', 5, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,4);
    }
    public function testBrieSellinBelowZeroMaxQualityUpdate() {
        $items = [new Item('Aged Brie', -5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,-6);
    }
    //Aged Brie End





//Backstage Start
    public function testBackstageUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 20, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->quality,16);
        $this->assertEquals($items[0]->sell_in,19);
    }
    public function testBackstageSellinZeroUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->quality,0);
        $this->assertEquals($items[0]->sell_in,-1);
    }
    public function testBackstageSellinBelowZeroUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', -10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->quality,0);
        $this->assertEquals($items[0]->sell_in,-11);
    }
    public function testBackstageSellinMaxQualityUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 2, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,1);
    }
    public function testBackstageSellin49QualityUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,4);
    }
    public function testBackstageSellinBelowZeroMaxQualityUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', -5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->quality,0);
        $this->assertEquals($items[0]->sell_in,-6);
    }
    //Backstage End

    //Start Sulfuras
    public function testSulfurasUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 50, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,50);
    }
    public function testSulfurasSellinZeroUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 50, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,50);
    }
    public function testSulfurasSellinBelowZeroUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 50, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,50);
    }
    public function testSulfurasSellinMaxQualityUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 50, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,50);
    }
    public function testSulfurasSellin49QualityUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 50, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,50);
    }
    public function testSulfurasSellinBelowZeroMaxQualityUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 50, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->quality,50);
        $this->assertEquals($items[0]->sell_in,50);
    }
//Sulfuras end
// Other start
public function testElixirUpdate() {
    $items = [new Item('Elixir of the Mongoose', 15, 5)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Elixir of the Mongoose');
    $this->assertEquals($items[0]->quality,4);
    $this->assertEquals($items[0]->sell_in,14);
}
public function testElixirSellinBelowZeroUpdate() {
    $items = [new Item('Elixir of the Mongoose', -2, 5)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Elixir of the Mongoose');
    $this->assertEquals($items[0]->quality,3);
    $this->assertEquals($items[0]->sell_in,-3);
}
public function testVestUpdate() {
    $items = [new Item('+5 Dexterity Vest', 15, 5)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'+5 Dexterity Vest');
    $this->assertEquals($items[0]->quality,4);
    $this->assertEquals($items[0]->sell_in,14);
}
public function testVestSellinBelowZeroUpdate() {
    $items = [new Item('+5 Dexterity Vest', -2, 5)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'+5 Dexterity Vest');
    $this->assertEquals($items[0]->quality,3);
    $this->assertEquals($items[0]->sell_in,-3);
}
//Other end
//Start Conjured
public function testConjuredUpdate() {
    $items = [new Item('Conjured Mana Cake', 50, 50)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Conjured Mana Cake');
    $this->assertEquals($items[0]->quality,48);
    $this->assertEquals($items[0]->sell_in,49);
}
public function testConjuredSellinZeroUpdate() {
    $items = [new Item('Conjured Mana Cake', 0, 50)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Conjured Mana Cake');
    $this->assertEquals($items[0]->quality,46);
    $this->assertEquals($items[0]->sell_in,-1);
}
public function testConjuredSellinBelowZeroUpdate() {
    $items = [new Item('Conjured Mana Cake', -5, 50)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Conjured Mana Cake');
    $this->assertEquals($items[0]->quality,46);
    $this->assertEquals($items[0]->sell_in,-6);
}
//Conjured end
}