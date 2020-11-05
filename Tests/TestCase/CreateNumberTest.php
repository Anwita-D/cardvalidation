<?php
declare(strict_types=1);
namespace Anwita\Test;
use Anwita\CreateNumber;
use PHPUnit\Framework\TestCase;

/**
 * Class CreateNumberTest
 * @package Anwita\Test
 */
class CreateNumberTest extends TestCase
{
    public function testNumber()
    {
        $this->assertTrue(CreateNumber::validate("7290223027031279"));
       // $this->assertFalse(CreateNumber::validate("7290223027031278"));
    }
}