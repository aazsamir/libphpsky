<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Subscription;

use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\PhpCar\Car\CarDecoder;
use CBOR\Decoder;
use CBOR\Normalizable;
use CBOR\StringStream;

readonly class MessageDecoder
{
    public function __construct(
        private TypeResolver $typeResolver,
    ) {}

    public function decode(string $message, string $lexicon): mixed
    {
        $cborDecoder = Decoder::create(CarDecoder::tagManager());

        $header = $cborDecoder->decode(new StringStream($message));
        $remaining = substr($message, \strlen((string) $header));

        if (!$header instanceof Normalizable) {
            throw new SubscriptionException('Invalid message header');
        }

        $header = $header->normalize();

        if (!\is_array($header) || !isset($header['t']) || !\is_string($header['t'])) {
            throw new SubscriptionException('Invalid message header');
        }

        $payload = $cborDecoder->decode(new StringStream($remaining));

        if (!$payload instanceof Normalizable) {
            throw new SubscriptionException('Invalid message payload');
        }

        $payload = $payload->normalize();

        if (!\is_array($payload)) {
            throw new SubscriptionException('Invalid message payload');
        }

        $type = $lexicon . $header['t'];
        $resolvedType = $this->typeResolver->resolve($type);

        if ($resolvedType === null) {
            return $payload;
        }

        return $resolvedType::fromArray($payload, $this->typeResolver);
    }
}
