<?php

declare(strict_types=1);

namespace App\Tests\Context\Support;

use App\Tests\Context\Context;
use Behat\Step\Then;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @api
 * @see http://behat.org/en/latest/quick_start.html
 */
final class VarDumperContext extends Context
{
    /**
     * @api
     */
    #[Then('/^dump "(?P<value>.+?)"$/')]
    public function thenDumpValue(mixed $value): void
    {
        VarDumper::dump($value);
    }
}
