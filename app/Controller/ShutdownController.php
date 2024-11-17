<?php

declare(strict_types=1);

namespace App\Controller;

use Lsp\Kernel\Attribute\AsController;
use Lsp\Router\Attribute\Route;
use Psr\Log\LoggerInterface;

#[AsController, Route('shutdown')]
final class ShutdownController
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {}

    public function __invoke(): void
    {
        $this->logger->info('Client shutdown');
    }
}
