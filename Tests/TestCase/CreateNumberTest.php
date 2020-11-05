<?php
declare(strict_types=1);
namespace Tests\TestCase;
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
        $this->assertEquals(0, CreateNumber::checkNumber((string)7290223027031279));

    }
}