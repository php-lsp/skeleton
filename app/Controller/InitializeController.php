<?php

declare(strict_types=1);

namespace App\Controller;

use Lsp\Kernel\Attribute\AsController;
use Lsp\Protocol\Type\FileOperationOptions;
use Lsp\Protocol\Type\FileOperationRegistrationOptions;
use Lsp\Protocol\Type\InitializeParams;
use Lsp\Protocol\Type\InitializeResult;
use Lsp\Protocol\Type\ServerCapabilities;
use Lsp\Protocol\Type\ServerInfo;
use Lsp\Protocol\Type\TextDocumentSyncKind;
use Lsp\Protocol\Type\WorkspaceFolder;
use Lsp\Protocol\Type\WorkspaceFoldersServerCapabilities;
use Lsp\Protocol\Type\WorkspaceOptions;
use Lsp\Router\Attribute\Route;
use Lsp\Workspace\File\VirtualFileInterface;

#[AsController, Route('initialize')]
final class InitializeController
{
    public function __invoke(InitializeParams $request): InitializeResult
    {
        // Example workspace folders
        foreach ($request->workspaceFolders ?? [] as $folder) {
            $this->examplePrintWorkspaceFolder($folder);
        }

        return new InitializeResult(
            capabilities: new ServerCapabilities(
                textDocumentSync: TextDocumentSyncKind::Incremental,
                workspace: new WorkspaceOptions(
                    workspaceFolders: new WorkspaceFoldersServerCapabilities(
                        supported: true,
                        changeNotifications: true,
                    ),
                    fileOperations: new FileOperationOptions(
                        didCreate: new FileOperationRegistrationOptions(
                            filters: [],
                        ),
                        willCreate: new FileOperationRegistrationOptions(
                            filters: [],
                        ),
                        didRename: new FileOperationRegistrationOptions(
                            filters: [],
                        ),
                        willRename: new FileOperationRegistrationOptions(
                            filters: [],
                        ),
                        didDelete: new FileOperationRegistrationOptions(
                            filters: [],
                        ),
                        willDelete: new FileOperationRegistrationOptions(
                            filters: [],
                        ),
                    ),
                ),
            ),
            serverInfo: new ServerInfo(
                name: 'example-lsp-server',
                version: '0.0.1',
            ),
        );
    }

    private function examplePrintWorkspaceFolder(WorkspaceFolder $folder): void
    {
        $projects = new \Lsp\Workspace\Project\ProjectFactory();

        $project = $projects->create($folder->uri, $folder->name);

        foreach ($project as $file) {
            $this->examplePrintProjectStructure($file, 0);
        }
    }

    private function examplePrintProjectStructure(VirtualFileInterface $file, int $level): void
    {
        if ($file->name === 'vendor') {
            return;
        }

        echo \str_repeat('  ', $level) . '- ' . $file . "\n";

        foreach ($file as $child) {
            $this->examplePrintProjectStructure($child, $level + 1);
        }
    }
}
