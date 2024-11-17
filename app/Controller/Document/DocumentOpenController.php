<?php

declare(strict_types=1);

namespace App\Controller\Document;

use Lsp\Kernel\Attribute\AsController;
use Lsp\Protocol\Type\DidOpenTextDocumentParams;
use Lsp\Router\Attribute\Route;
use Psr\Log\LoggerInterface;

#[AsController, Route('textDocument/didOpen')]
final class DocumentOpenController
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {}

    public function __invoke(DidOpenTextDocumentParams $request): void
    {
        $this->logger->info('Open document {uri}', [
            'uri' => $request->textDocument->uri,
        ]);
    }
}
