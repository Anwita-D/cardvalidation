<?php
declare(strict_types=1);
namespace Anwita\Test;
use Anwita\LuhnNumber;
use PHPUnit\Framework\TestCase;

/**
 * Class LuhnNumberTest
 * @package Anwita\Test
 */
class LuhnNumberTest extends TestCase
{
    public function testValidate()
    {
        $this->assertTrue(LuhnNumber::validate("7290223027031279"));
        $this->assertTrue(LuhnNumber::validate("5437687662339130"));
        $this->assertTrue(LuhnNumber::validate("30468772582790"));
        $this->assertFalse(LuhnNumber::validate("7290223027031278"));
    }

    public function testGenerate()
    {
        $cardNumber = LuhnNumber::generate("786", 16);
        print $cardNumber;
        $this->assertEquals(16, strlen($cardNumber));
        $this->assertStringStartsWith("786", $cardNumber);
        $this->assertTrue(LuhnNumber::validate($cardNumber));
    }
}