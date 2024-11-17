<?php

declare(strict_types=1);

namespace App\Controller\Document;

use Lsp\Kernel\Attribute\AsController;
use Lsp\Protocol\Type\DidCloseTextDocumentParams;
use Lsp\Router\Attribute\Route;
use Psr\Log\LoggerInterface;

#[AsController, Route('textDocument/didClose')]
final class DocumentCloseController
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {}

    public function __invoke(DidCloseTextDocumentParams $request): void
    {
        $this->logger->info('Close document {uri}', [
            'uri' => $request->textDocument->uri,
        ]);
    }
}
