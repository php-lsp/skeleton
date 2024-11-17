<?php

declare(strict_types=1);

namespace App\Controller\Document;

use Lsp\Kernel\Attribute\AsController;
use Lsp\Protocol\Type\DidChangeTextDocumentParams;
use Lsp\Router\Attribute\Route;
use Psr\Log\LoggerInterface;

#[AsController, Route('textDocument/didChange')]
final class DocumentChangeController
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {}

    public function __invoke(DidChangeTextDocumentParams $request): void
    {
        $this->logger->info('Update document {uri}', [
            'uri' => $request->textDocument->uri,
        ]);
    }
}
