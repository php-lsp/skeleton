<?php

declare(strict_types=1);

namespace App\Listener;

use Lsp\Server\Event\Server\ServerStarted;
use Symfony\Component\DependencyInjection\Attribute\When;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

/**
 * @api
 *
 * @link https://symfony.com/doc/current/service_container.html#service-container_limiting-to-env
 * @link https://symfony.com/doc/current/event_dispatcher.html#event-dispatcher_event-listener-attributes
 */
#[When('dev'), AsEventListener]
final class ServerListener extends LoggerListener
{
    public function __invoke(ServerStarted $event): void
    {
        $this->logger->debug('[{address}] Started', [
            'address' => $event->server->getAddress(),
        ]);
    }
}
