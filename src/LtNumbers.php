<?php 
namespace LtWords\LtNumbers;
 
class LtNumbers {
  private $_basicNumbers = array(
      "0" => "nulis",
      "1" => "vienas",
      "2" => "du",
      "3" => "trys",
      "4" => "keturi",
      "5" => "penki",
      "6" => "šeši",
      "7" => "septyni",
      "8" => "aštuoni",
      "9" => "devyni",
      "10" => "dešimt",
      "11" => "vienuolika",
      "12" => "dvylika",
      "13" => "trylika",
      "14" => "keturiolika",
      "15" => "penkiolika",
      "16" => "šešiolika",
      "17" => "septyniolika",
      "18" => "aštuoniolika",
      "19" => "devyniolika"
  );
  
  private $_tens = array(
      "2" => "dvidešimt",
      "3" => "trisdešimt",
      "4" => "keturiasdešimt",
      "5" => "penkiasdešimt",
      "6" => "šešiasdešimt",
      "7" => "septyniasdešimt",
      "8" => "aštuoniasdešimt",
      "9" => "devyniasdešimt",
  );
  
  private $_genitives = array(
      "10", "11", "12", "13", "14", "15", "16", "17", "18", "19",
      "20", "30", "40", "50", "60", "70", "80", "90"
  );
 
  public function hasCheese($bool = true)
  {
    return $bool;
  }

  public function numberToText($number)
  {
	  if (!is_numeric($number)) {
		  return "";
	  }
      
      if ($number < 20) {
		  return $this->_basicNumbers[0 + $number];
	  }

      if ($number < 100) {
		  $tens = floor($number / 10);
		  $units = $number % 10;
		  
		  if ($units == 0) {
			  return $this->_tens[0 + $tens];
		  }
		  
		  return $this->_tens[0 + $tens] . " " . $this->_basicNumbers[0 + $units];
	  }
	  
	  if ($number < 1000) {
		  $hundreds = floor($number / 100);
		  $tensUnits = $number % 100;
		  
		  if ($tensUnits == 0) {
			  if ($hundreds == 1) {
				  return "šimtas";
			  }
			  return $this->_basicNumbers[0 + $hundreds] . " šimtai";
		  }
		  
		  if ($hundreds == 1) {
			  return "šimtas " . $this->numberToText($tensUnits);
		  }
		  
		  return $this->_basicNumbers[0 + $hundreds] . " šimtai " . $this->numberToText($tensUnits);
	  }

      if ($number < 1000000) {
		  $thousands = floor($number / 1000);
		  $hundredsTensUnits = $number % 1000;
		  
		  $thousandsWord = "tūkstančiai";
		  if (($thousands % 10) == 1) {
			  $thousandsWord = "tūkstantis";
		  }
		  $tensUnits = $thousands % 100;
		  if (in_array($tensUnits, $this->_genitives)) {
			  $thousandsWord = "tūkstančių";
		  }

		  if ($hundredsTensUnits == 0) {
			  if ($thousands == 1) {
				  return "tūkstantis";
			  }
			  return $this->numberToText($thousands) . " $thousandsWord";
		  }
		  
		  if ($thousands == 1) {
			  return "tūkstantis " . $this->numberToText($hundredsTensUnits);
		  }
		  
		  return $this->numberToText($thousands) . " $thousandsWord " . $this->numberToText($hundredsTensUnits);
	  }
	  return "!";
  }
}
