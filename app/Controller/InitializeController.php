<?php

declare(strict_types=1);

namespace App\Controller;

use Lsp\Kernel\Attribute\AsController;
use Lsp\Protocol\Type\InitializeParams;
use Lsp\Protocol\Type\InitializeResult;
use Lsp\Protocol\Type\ServerCapabilities;
use Lsp\Protocol\Type\ServerInfo;
use Lsp\Protocol\Type\TextDocumentSyncKind;
use Lsp\Router\Attribute\Route;

#[AsController, Route('initialize')]
final class InitializeController
{
    public function __invoke(InitializeParams $request): InitializeResult
    {
        return new InitializeResult(
            capabilities: new ServerCapabilities(
                textDocumentSync: TextDocumentSyncKind::Full,
            ),
            serverInfo: new ServerInfo(
                name: 'example-lsp-server',
                version: '0.0.1',
            ),
        );
    }
}
