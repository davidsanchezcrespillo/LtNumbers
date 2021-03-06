<?php 
namespace LtWords\LtNumbers;
 
/**
 * Class to convert numeric strings into textual form in Lithuanian
 * language.
 * 
 * @author   David Sánchez Crespillo <davidsanchezcrespillo@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 */
class LtNumbers
{
    /** Basic numbers, 0-19 */
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
  
    /** Multiples of 10 */
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
  
    /** Terminations needing plural genitive after them */
    private $_genitives = array(
        "0", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19",
        "20", "30", "40", "50", "60", "70", "80", "90"
    );
 
    /**
     * Convert a positive number to its textual form.
     * 
     * @param string $number the number to be introduced.
     * Numbers from 0 to 1000 000 000 are allowed.
     * 
     * @return a string containing the textual form. Empty string if the
     * number is out of range.
     */
    public function numberToText($number)
    {
        $inputIsInt = filter_var($number, FILTER_VALIDATE_INT);
        if ($inputIsInt === false) {
            return "";
        }

        if (!is_numeric($number)) {
            return "";
        }

        if ((0 + $number) < 0) {
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
          
            return $this->_tens[0 + $tens] .
                " " .
                $this->_basicNumbers[0 + $units];
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
          
            return $this->_basicNumbers[0 + $hundreds] .
                " šimtai " .
                $this->numberToText($tensUnits);
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
          
            return $this->numberToText($thousands) .
                " $thousandsWord " .
                $this->numberToText($hundredsTensUnits);
        }
      
        if ($number < 1000000000) {
            $millions = floor($number / 1000000);
            $hundredThousands = $number % 1000000;
          
            $millionsWord = "milijonai";
            if (($millions % 10) == 1) {
                $millionsWord = "milijonas";
            }
            $tensUnits = $millions % 100;
            if (in_array($tensUnits, $this->_genitives)) {
                $millionsWord = "milijonų";
            }
          
            if ($hundredThousands == 0) {
                if ($millions == 1) {
                    return "milijonas";
                }
                return $this->numberToText($millions) . " $millionsWord";
            }
          
            if ($millions == 1) {
                return "milijonas " . $this->numberToText($hundredThousands);
            }
          
            return $this->numberToText($millions) . 
                " $millionsWord " .
                $this->numberToText($hundredThousands);
        }
      
        if ($number == 1000000000) {
            return "milijardas";
        }

        return "";
    }
}
