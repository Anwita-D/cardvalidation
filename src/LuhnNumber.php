<?php
declare(strict_types=1);
namespace Anwita;
use InvalidArgumentException;

/**
 * Class LuhnNumber
 * @package Anwita
 */
class LuhnNumber
{

    /**
     * @param int $digit
     * @param bool $flag
     * @return int
     */
    protected static function doubleDigit(int $digit, bool &$flag)
    {
        if ($flag) {
            $doubleOfNumber = $digit*2;
            if ($doubleOfNumber > 9) {
                $doubleOfNumber = $doubleOfNumber-9;
            }
            $flag = false;
        } else {
            $doubleOfNumber = $digit;
            $flag = true;
        }
        return $doubleOfNumber;
    }

    /**
     * @param string $prefix
     * @param int $length
     * @return string
     */
    public static function generate(string $prefix, int $length ) : string
    {
        $prefixLength = strlen($prefix);
        if ($length <= $prefixLength) {
            throw new InvalidArgumentException("Either prefix or length or both are incorrect");
        }
        $cardNumber = str_split($prefix);
        $doubleDigit = true;
        $sumOfNumbers = 0;
        for ($i = $prefixLength; $i < $length-1; $i++) {
            array_push($cardNumber, mt_rand(0, 9));
        }
        for ($i = $length-2; $i >= 0; $i--) {
            $updatedNumber = self::doubleDigit((int)$cardNumber[$i], $doubleDigit);
            $sumOfNumbers += $updatedNumber;
        }
        $checkDigit = (10-($sumOfNumbers%10))%10;
        array_push($cardNumber, $checkDigit);
        $cardNumber = implode("", $cardNumber);
        return $cardNumber;
    }

    /**
     * @param string $number
     * @return bool
     */
    public static function validate(string $number) : bool
    {
        $cardNumber = str_split($number);
        $checkDigit = array_pop($cardNumber);
        $arrayLength = count($cardNumber);
        $doubleDigit = true;
        $sumOfNumbers = 0;
        for ($i = $arrayLength-1; $i >=0; $i--) {
            $updatedNumber = self::doubleDigit((int)$cardNumber[$i], $doubleDigit);
            $sumOfNumbers += $updatedNumber;
        }
        $computedCheckDigit = (10-($sumOfNumbers%10))%10;
        return (int)$checkDigit === $computedCheckDigit;
    }

}