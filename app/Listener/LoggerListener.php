<?php

declare(strict_types=1);

namespace App\Listener;

use Psr\Log\LoggerInterface;

abstract class LoggerListener
{
    public function __construct(
        protected readonly LoggerInterface $logger,
    ) {}
}
