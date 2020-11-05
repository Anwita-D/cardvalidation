<?php
declare(strict_types=1);
namespace Anwita;
use InvalidArgumentException;

/**
 * Class CreateNumber
 * @package Anwita
 */
class CreateNumber
{
    /**
     * @param string $prefix
     * @param string $length
     * @return string
     */
    public static function numberCreate(string $prefix, string $length ) : string
    {
        if ($length >= strlen($prefix)) {
            throw new InvalidArgumentException("Length and prefix cannot equal");
        }
        $result = '';
        $new_length = $length - strlen((string)$prefix);
        for ($i =0 ; $i <= $new_length; $i++) {
            $result .= mt_rand(0, 9);
        }
        $result = $prefix.$result;
        if($result == 0) {
            return $result;
        }
        throw new InvalidArgumentException("Number is not correct");
    }

    /**
     * @param string $number
     * @return bool
     */
    public static function validate(string $number) : bool
    {
        $numberArray = str_split($number);
        $checkDigit = array_pop($numberArray);
        $arrayLength = count($numberArray);
        $doubleDigit = true;
        $sumOfNumbers = 0;
        for ($i = $arrayLength-1; $i >=0; $i--) {
            if ($doubleDigit) {
                $doubleOfNumber = $numberArray[$i]*2;
                if ($doubleOfNumber > 9) {
                    $doubleOfNumber = $doubleOfNumber-9;
                }
                $sumOfNumbers += $doubleOfNumber;
                $doubleDigit = false;
            } else {
                $sumOfNumbers += $numberArray[$i]*1;
                $doubleDigit = true;
            }
        }
        return (int)$checkDigit === (10-($sumOfNumbers%10));
    }

}