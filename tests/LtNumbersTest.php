<?php
 
use LtWords\LtNumbers\LtNumbers;
 
class LtNumbersTest extends PHPUnit_Framework_TestCase {
 
  public function testHasCheese()
  {
    $ltNumbers = new LtNumbers;
    $this->assertTrue($ltNumbers->hasCheese());
  }
 
  public function testNumberToText()
  {
	  $ltNumbers = new LtNumbers;
	  
	  $this->assertEquals("", $ltNumbers->numberToText(""));
	  $this->assertEquals("", $ltNumbers->numberToText("fjfjeij"));
	  $this->assertEquals("", $ltNumbers->numberToText("-------"));
	  $this->assertNotEquals("", $ltNumbers->numberToText("0"));
  }
  
  public function testBasicNumbers()
  {
	  $ltNumbers = new LtNumbers;
	  
	  $this->assertEquals("nulis", $ltNumbers->numberToText("0"));
	  $this->assertEquals("vienas", $ltNumbers->numberToText("1"));
	  $this->assertEquals("du", $ltNumbers->numberToText("2"));
	  $this->assertEquals("trys", $ltNumbers->numberToText("3"));
	  $this->assertEquals("keturi", $ltNumbers->numberToText("4"));
	  $this->assertEquals("penki", $ltNumbers->numberToText("5"));
	  $this->assertEquals("sesi", $ltNumbers->numberToText("6"));
	  $this->assertEquals("septyni", $ltNumbers->numberToText("7"));
	  $this->assertEquals("astuoni", $ltNumbers->numberToText("8"));
	  $this->assertEquals("devyni", $ltNumbers->numberToText("9"));
	  
  }
}

