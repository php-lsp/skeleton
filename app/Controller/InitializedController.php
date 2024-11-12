<?php

declare(strict_types=1);

namespace App\Controller;

use Lsp\Contracts\Server\ConnectionInterface;
use Lsp\Kernel\Attribute\AsController;
use Lsp\Protocol\Type\InitializeResult;
use Lsp\Router\Attribute\Route;

#[AsController, Route('initialized')]
final class InitializedController
{
    public function __invoke(ConnectionInterface $connection): InitializeResult
    {
        dd($connection);
    }
}
