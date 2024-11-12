<?php

declare(strict_types=1);

namespace App\Tests\Context\Provider;

use App\Tests\Context\Context;
use Behat\Step\Given;

/**
 * @api
 * @see http://behat.org/en/latest/quick_start.html
 */
final class ExampleProviderContext extends Context
{
    public ?string $value = null;

    #[Given('/^I have an example "(?P<value>.+?)"$/')]
    public function givenExample(string $value): void
    {
        $this->value = $value;
    }
}
