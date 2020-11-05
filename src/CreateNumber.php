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
     * @param int $prefix
     * @param int $length
     * @return string
     */
    public static function numberCreate(int $prefix, int $length ) : string
    {
        if ($length >= $prefix) {
            throw new InvalidArgumentException("Length and prefix cannot equal");
        }
        $result = '';
        $new_length = $length - strlen($prefix);
        for ($i =0 ; $i <= count($new_length); $i++) {
            $result .= mt_rand(0, 9);
        }
        $result = CreateNumber::checkNumber($prefix.$result);
        if($result == 0) {
            return $prefix . $result;
        }
        throw new InvalidArgumentException("Number is not correct");
    }

    /**
     * @param string $number
     * @return int
     */
    public static function checkNumber(string $number) : int
    {
        $sum = '';
        for ($i = strlen($number) -1; $i >= 0; --$i) {
            $chk_number = $i %2 !== 0 ? $number[$i]*2 : $number[$i];
            if($chk_number>9){
                $sum += array_sum(str_split($number));
            }else{
                $sum += $number[$i] ;
            }
        }
        return $sum %10;
    }

}