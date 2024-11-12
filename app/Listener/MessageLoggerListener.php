<?php

declare(strict_types=1);

namespace App\Listener;

use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Codec\Exception\EncodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\IdentifiableInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Psr\Log\LoggerInterface;

abstract class MessageLoggerListener
{
    public function __construct(
        protected readonly LoggerInterface $logger,
        protected readonly EncoderInterface $encoder,
    ) {}

    protected function messageToTemplate(MessageInterface $message): string
    {
        $result = '';

        if ($message instanceof IdentifiableInterface) {
            $result .= ' #{id}';
        }

        if ($message instanceof RequestInterface) {
            $result .= ' "{method}"';
        }

        return $result;
    }

    /**
     * @return array<array-key, mixed>
     * @throws EncodingExceptionInterface
     */
    protected function messageToArray(MessageInterface $message): array
    {
        // it is worth noting that the encoded message can be arbitrary,
        // but in the vast majority of cases it is a JSON.
        $encoded = $this->encoder->encode($message);

        try {
            return (array) \json_decode($encoded, true, flags: \JSON_THROW_ON_ERROR);
        } catch (\Throwable $e) {
            return [
                'data' => $encoded,
                'data_decoding_error' => $e->getMessage(),
            ];
        }
    }
}
