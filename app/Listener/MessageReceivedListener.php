<?php

declare(strict_types=1);

namespace App\Listener;

use Lsp\Server\Event\MessageReceived;
use Symfony\Component\DependencyInjection\Attribute\When;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

/**
 * @api
 *
 * @link https://symfony.com/doc/current/service_container.html#service-container_limiting-to-env
 * @link https://symfony.com/doc/current/event_dispatcher.html#event-dispatcher_event-listener-attributes
 */
#[When('dev'), AsEventListener]
final class MessageReceivedListener extends MessageLoggerListener
{
    public function __invoke(MessageReceived $event): void
    {
        $this->logger->debug('[{client}] Received' . $this->messageToTemplate($event->message), [
            'client' => $event->connection->getAddress(),
            ...$this->messageToArray($event->message),
        ]);
    }
}
