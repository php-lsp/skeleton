<?php

declare(strict_types=1);

namespace App\Controller;

use Lsp\Kernel\Attribute\AsController;
use Lsp\Protocol\Type\InitializedParams;
use Lsp\Router\Attribute\Route;
use Psr\Log\LoggerInterface;

#[AsController, Route('initialized')]
final class InitializedController
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {}

    public function __invoke(InitializedParams $initialized): void
    {
        $this->logger->info('Extension is initialized');
    }
}
