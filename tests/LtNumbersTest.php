<?php
 
use LtWords\LtNumbers\LtNumbers;
 
class LtNumbersTest extends PHPUnit_Framework_TestCase {
 
  private $_ltNumbers;
  
  public function setUp()
  {
	  $this->_ltNumbers = new LtNumbers;
  }
  
  public function testHasCheese()
  {
    $this->assertTrue($this->_ltNumbers->hasCheese());
  }
 
  public function testNumberToText()
  {
	  $this->assertEquals("", $this->_ltNumbers->numberToText(""));
	  $this->assertEquals("", $this->_ltNumbers->numberToText("fjfjeij"));
	  $this->assertEquals("", $this->_ltNumbers->numberToText("-------"));
	  $this->assertNotEquals("", $this->_ltNumbers->numberToText("0"));
	  $this->assertNotEquals("", $this->_ltNumbers->numberToText("0000"));
  }
  
  public function testBasicNumbers()
  {
	  $this->assertEquals("nulis", $this->_ltNumbers->numberToText("0"));
	  $this->assertEquals("vienas", $this->_ltNumbers->numberToText("1"));
	  $this->assertEquals("du", $this->_ltNumbers->numberToText("2"));
	  $this->assertEquals("trys", $this->_ltNumbers->numberToText("3"));
	  $this->assertEquals("keturi", $this->_ltNumbers->numberToText("4"));
	  $this->assertEquals("penki", $this->_ltNumbers->numberToText("5"));
	  $this->assertEquals("šeši", $this->_ltNumbers->numberToText("6"));
	  $this->assertEquals("septyni", $this->_ltNumbers->numberToText("7"));
	  $this->assertEquals("aštuoni", $this->_ltNumbers->numberToText("8"));
	  $this->assertEquals("devyni", $this->_ltNumbers->numberToText("9"));
	  $this->assertEquals("dešimt", $this->_ltNumbers->numberToText("10"));
	  $this->assertEquals("vienuolika", $this->_ltNumbers->numberToText("11"));
	  $this->assertEquals("dvylika", $this->_ltNumbers->numberToText("12"));
	  $this->assertEquals("trylika", $this->_ltNumbers->numberToText("13"));
	  $this->assertEquals("keturiolika", $this->_ltNumbers->numberToText("14"));
	  $this->assertEquals("penkiolika", $this->_ltNumbers->numberToText("15"));
	  $this->assertEquals("šešiolika", $this->_ltNumbers->numberToText("16"));
	  $this->assertEquals("septyniolika", $this->_ltNumbers->numberToText("17"));
	  $this->assertEquals("aštuoniolika", $this->_ltNumbers->numberToText("18"));
	  $this->assertEquals("devyniolika", $this->_ltNumbers->numberToText("19"));
  }
  
  public function testBasicTens()
  {
	  $this->assertEquals("dvidešimt", $this->_ltNumbers->numberToText("20"));
	  $this->assertEquals("trisdešimt", $this->_ltNumbers->numberToText("30"));
  }
  
  public function testLessThan100()
  {
	  $this->assertEquals("dvidešimt vienas", $this->_ltNumbers->numberToText("21"));
	  $this->assertEquals("trisdešimt du", $this->_ltNumbers->numberToText("32"));
	  $this->assertEquals("devyniasdešimt aštuoni", $this->_ltNumbers->numberToText("98"));
  }
  
  public function testLessThan1000()
  {
	  $this->assertEquals("šimtas", $this->_ltNumbers->numberToText("100"));
	  $this->assertEquals("šimtas vienas", $this->_ltNumbers->numberToText("101"));
	  $this->assertEquals("šimtas dešimt", $this->_ltNumbers->numberToText("110"));
	  $this->assertEquals("šimtas dvidešimt", $this->_ltNumbers->numberToText("120"));
	  $this->assertEquals("šimtas dvidešimt trys", $this->_ltNumbers->numberToText("123"));
	  $this->assertEquals("šimtas septyniasdešimt trys", $this->_ltNumbers->numberToText("173"));
	  $this->assertEquals("trys šimtai septyniasdešimt trys", $this->_ltNumbers->numberToText("373"));
	  $this->assertEquals("aštuoni šimtai septyniasdešimt septyni", $this->_ltNumbers->numberToText("877"));
  }
  
  public function testLessThanOneMillion()
  {
      $this->assertEquals("tūkstantis", $this->_ltNumbers->numberToText("1000"));
      $this->assertEquals("du tūkstančiai", $this->_ltNumbers->numberToText("2000"));

	  $this->assertEquals("aštuoni šimtai septyniasdešimt septyni tūkstančiai trys šimtai dvidešimt vienas", $this->_ltNumbers->numberToText("877321"));
	  $this->assertEquals("aštuoni šimtai septyniasdešimt vienas tūkstantis trys šimtai dvidešimt vienas", $this->_ltNumbers->numberToText("871321"));

	  $this->assertEquals("aštuoni šimtai penkiolika tūkstančių trys šimtai dvidešimt vienas", $this->_ltNumbers->numberToText("815321"));
	  $this->assertEquals("penkiolika tūkstančių", $this->_ltNumbers->numberToText("15000"));
  }
}

