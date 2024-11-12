<?php

declare(strict_types=1);

namespace App\Listener;

use Lsp\Contracts\Server\Event\MessageSent;
use Symfony\Component\DependencyInjection\Attribute\When;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

/**
 * @api
 *
 * @link https://symfony.com/doc/current/service_container.html#service-container_limiting-to-env
 * @link https://symfony.com/doc/current/event_dispatcher.html#event-dispatcher_event-listener-attributes
 */
#[When('dev'), AsEventListener]
final class MessageSentListener extends MessageLoggerListener
{
    public function __invoke(MessageSent $event): void
    {
        $this->logger->debug('[{client}] Sent' . $this->messageToTemplate($event->message), [
            'client' => $event->connection->getClientAddress(),
            ...$this->messageToArray($event->message),
        ]);
    }
}
