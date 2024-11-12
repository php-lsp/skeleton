<?php

declare(strict_types=1);

namespace App\Tests\Context\Assert;

use App\Tests\Context\Context;
use App\Tests\Context\Provider\ExampleProviderContext;
use Behat\Step\Then;

/**
 * @api
 * @see http://behat.org/en/latest/quick_start.html
 */
final class ExampleAssertionsContext extends Context
{
    public ?string $value = null;

    #[Then('/^value is "(?P<value>.+?)"$/')]
    public function thenExampleSameTo(string $value): void
    {
        $provider = $this->from(ExampleProviderContext::class);

        self::assertSame($provider->value, $value);
    }
}
