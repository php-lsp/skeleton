<p align="center">
    <a href="https://github.com/php-lsp" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/153323085?s=120" width="120">
    </a>
</p>

## About Language Server Protocol

> [ALARM] This is not the final version!

---

LSP is a protocol for interaction with a client using the JSON-RPC 2.0 codec, 
where arbitrary editors and IDEs act as clients.

The protocol is supported by many clients, such as:

**Most Popular Editors:**
- [VSCode](https://code.visualstudio.com/)
- [Vim (Neovim)](https://neovim.io/)
- [Atom](https://atom.io/)
- [Brackets](https://brackets.io/)
- [Lapce](https://lap.dev/lapce/)
- [GigaIDE Cloud](https://gitverse.ru/features/gigaide/cloud/)
- [JetBrains Fleet](https://www.jetbrains.com/fleet/)
- [Sublime](https://github.com/sublimelsp/LSP)
- *...etc*

**Most Popular IDE:**
- [JetBrains (PhpStorm, IDEA, RustRover, GoLand, etc)](https://www.jetbrains.com/)
- [GigaIDE Desktop](https://gitverse.ru/features/gigaide/desktop/)
- [Eclipse](https://www.eclipse.org/)
- [Emacs](https://www.gnu.org/software/emacs/)
- [QT Creator](https://www.qt.io/product/development-tools)
- [RAD Studio](https://www.embarcadero.com/products/rad-studio)
- [Visual Studio](https://marketplace.visualstudio.com/items?itemName=vsext.LanguageServerClientPreview)
- *...etc*

This project gives you the opportunity to write your own plugins for any
editor or IDE using the PHP language!

## Installation

```shell
# create an extension application
composer create-project php-lsp/skeleton

# allow build script to run (required once)
chmod +x bin/build
```

## Running Server

### Run From Sources

```shell
php ./bin/lsp serve App\\Application --port=5007
```

### Run From Code

```php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$app = new \App\Application('dev', true);
$app->listen('tcp://127.0.0.1:5007');
```

### Run PHAR Assembly

```shell
composer build:run:local
```

### Run Binary Assembly

```shell
composer build:run
```

## Building Server

### Building PHAR Assembly

```shell
# build assembly
composer build

# list of assemblies
ls -la ./var/prod/
```

### Building Binary Assembly

```shell
# install dependencies (only needs to be called once)
composer build:prepare

# build assembly
composer build

# list of assemblies
ls -la ./var/prod/
```

## Running Extension Client

Please note that these are just extension examples. 
Unification of the assembly without code (JS, Java, C#, etc) modification 
will come later, perhaps.

### VSCode

See [client/vscode/package.json](client/vscode/package.json) to modify 
the configuration.

1) Build and run editor:
    ```shell
    # move to vscode workspace
    cd client/vscode
    
    # install dependencies
    npm install
    
    # run client
    code .
    ```
2) Then press `F5` (in editor) to run extension

