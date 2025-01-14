<?php

declare(strict_types=1);

namespace App;

use Lsp\Extension\DocumentManager\DocumentManagerExtension;
use Lsp\Kernel\LanguageServerKernel;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Application extends LanguageServerKernel
{
    protected function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new DocumentManagerExtension());
    }
}
