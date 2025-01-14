<?php

declare(strict_types=1);

namespace App\Controller;

use Lsp\Extension\DocumentManager\EditorInterface;
use Lsp\Kernel\Attribute\AsController;
use Lsp\Protocol\Type\CodeLens;
use Lsp\Protocol\Type\CodeLensParams;
use Lsp\Protocol\Type\Command;
use Lsp\Protocol\Type\Position;
use Lsp\Protocol\Type\Range;
use Lsp\Router\Attribute\Route;

#[AsController, Route('textDocument/codeLens')]
final class CodeLensController
{
    /**
     * @return iterable<array-key, CodeLens>
     */
    public function __invoke(CodeLensParams $request): iterable
    {
        yield new CodeLens(
            range: new Range(
                start: new Position(1, 0),
                end: new Position(1, 120),
            ),
            command: new Command(
                title: 'Hello from PHP',
                command: 'hello',
                arguments: [],
            ),
        );
    }
}
