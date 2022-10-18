<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Item;
use GildedRose\GildedRose;
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
        $this->assertEquals($items[0]->sell_in,14);
        $this->assertEquals($items[0]->quality,21);
    }
    public function testBrieSellinZeroUpdate() {
        $items = [new Item('Aged Brie', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,-1);
        $this->assertEquals($items[0]->quality,12);
    }
    public function testBrieSellinBelowZeroUpdate() {
        $items = [new Item('Aged Brie', -10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,-11);
        $this->assertEquals($items[0]->quality,12);
    }
    public function testBrieSellinMaxQualityUpdate() {
        $items = [new Item('Aged Brie', 2, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,1);
        $this->assertEquals($items[0]->quality,50);
    }
    public function testBrieSellin49QualityUpdate() {
        $items = [new Item('Aged Brie', 5, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,4);
        $this->assertEquals($items[0]->quality,50);
    }
    public function testBrieSellinBelowZeroMaxQualityUpdate() {
        $items = [new Item('Aged Brie', -5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Aged Brie');
        $this->assertEquals($items[0]->sell_in,-6);
        $this->assertEquals($items[0]->quality,50);
    }
    //Aged Brie End





//Backstage Start
    public function testBackstageUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 20, 15)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,19);
        $this->assertEquals($items[0]->quality,16);
    }
    public function testBackstageSellinZeroUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,-1);
        $this->assertEquals($items[0]->quality,0);
    }
    public function testBackstageSellinBelowZeroUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', -10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,-11);
        $this->assertEquals($items[0]->quality,0);
    }
    public function testBackstageSellinMaxQualityUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 2, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,1);
        $this->assertEquals($items[0]->quality,50);
    }
    public function testBackstageSellin49QualityUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,4);
        $this->assertEquals($items[0]->quality,50);
    }
    public function testBackstageSellinBelowZeroMaxQualityUpdate() {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', -5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Backstage passes to a TAFKAL80ETC concert');
        $this->assertEquals($items[0]->sell_in,-6);
        $this->assertEquals($items[0]->quality,0);
    }
    //Backstage End

    //Start Sulfuras
    public function testSulfurasUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 10, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->sell_in,10);
        $this->assertEquals($items[0]->quality,80);
    }
    public function testSulfurasSellinZeroUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->sell_in,0);
        $this->assertEquals($items[0]->quality,80);
    }
    public function testSulfurasSellinBelowZeroUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', -5, -5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->sell_in,-5);
        $this->assertEquals($items[0]->quality,80);
    }
    public function testSulfurasSellinMaxQualityUpdate() {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->name,'Sulfuras, Hand of Ragnaros');
        $this->assertEquals($items[0]->sell_in,0);
        $this->assertEquals($items[0]->quality,80);
    }
//Sulfuras end
// Elixir + vest start
public function testElixirUpdate() {
    $items = [new Item('Elixir of the Mongoose', 15, 5)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Elixir of the Mongoose');
    $this->assertEquals($items[0]->sell_in,14);
    $this->assertEquals($items[0]->quality,4);
}
public function testElixirSellinBelowZeroUpdate() {
    $items = [new Item('Elixir of the Mongoose', -2, 5)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Elixir of the Mongoose');
    $this->assertEquals($items[0]->sell_in,-3);
    $this->assertEquals($items[0]->quality,3);
}
public function testElixirQualityZeroUpdate() {
    $items = [new Item('Elixir of the Mongoose', -2, 0)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Elixir of the Mongoose');
    $this->assertEquals($items[0]->sell_in,-3);
    $this->assertEquals($items[0]->quality,-2);
}
public function testVestUpdate() {
    $items = [new Item('+5 Dexterity Vest', 15, 5)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'+5 Dexterity Vest');
    $this->assertEquals($items[0]->sell_in,14);
    $this->assertEquals($items[0]->quality,4);
}
public function testVestSellinBelowZeroUpdate() {
    $items = [new Item('+5 Dexterity Vest', -2, 5)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'+5 Dexterity Vest');
    $this->assertEquals($items[0]->sell_in,-3);
    $this->assertEquals($items[0]->quality,3);
}
public function testVestQualityZeroUpdate() {
    $items = [new Item('+5 Dexterity Vest', -2, 0)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'+5 Dexterity Vest');
    $this->assertEquals($items[0]->sell_in,-3);
    $this->assertEquals($items[0]->quality,-2);
}
//Elixir + vest end
//Start Conjured
public function testConjuredUpdate() {
    $items = [new Item('Conjured Mana Cake', 50, 50)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Conjured Mana Cake');
    $this->assertEquals($items[0]->sell_in,49);
    $this->assertEquals($items[0]->quality,48);
}
public function testConjuredSellinZeroUpdate() {
    $items = [new Item('Conjured Mana Cake', 0, 50)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Conjured Mana Cake');
    $this->assertEquals($items[0]->sell_in,-1);
    $this->assertEquals($items[0]->quality,46);
}
public function testConjuredSellinBelowZeroUpdate() {
    $items = [new Item('Conjured Mana Cake', -5, 50)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Conjured Mana Cake');
    $this->assertEquals($items[0]->sell_in,-6);
    $this->assertEquals($items[0]->quality,46);
}
public function testConjuredQualityZeroUpdate() {
    $items = [new Item('Conjured Mana Cake', -5, 0)];
    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();
    $this->assertEquals($items[0]->name,'Conjured Mana Cake');
    $this->assertEquals($items[0]->sell_in,-6);
    $this->assertEquals($items[0]->quality,-4);
}
//Conjured tests end
}