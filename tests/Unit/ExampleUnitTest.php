<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;

#[Group('unit')]
final class ExampleUnitTest extends TestCase
{
    #[TestDox('should be passed')]
    public function testPositiveResult(): void
    {
        $this->assertTrue(true);
    }

    #[TestDox('should be failed')]
    public function testNegativeResult(): void
    {
        $this->assertTrue(false);
    }
}
