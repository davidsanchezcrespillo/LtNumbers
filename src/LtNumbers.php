<?php 
namespace LtWords\LtNumbers;
 
class LtNumbers {
  private $basicNumbers = array(
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
		  return $this->basicNumbers[0 + $number];
	  }

	  return "!";
  }
}
