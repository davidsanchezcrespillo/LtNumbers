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
      "6" => "sesi",
      "7" => "septyni",
      "8" => "astuoni",
      "9" => "devyni"
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
      
      if ($number < 10) {
		  return $this->basicNumbers[$number];
	  }

	  return "!";
  }
}
