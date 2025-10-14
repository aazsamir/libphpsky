<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream;

use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\Libphpsky\Jetstream\Model\Account;
use Aazsamir\Libphpsky\Jetstream\Model\AccountEvent;
use Aazsamir\Libphpsky\Jetstream\Model\CommitCreate;
use Aazsamir\Libphpsky\Jetstream\Model\CommitEvent;
use Aazsamir\Libphpsky\Jetstream\Model\Event;
use Aazsamir\Libphpsky\Jetstream\Model\Identity;
use Aazsamir\Libphpsky\Jetstream\Model\IdentityEvent;
use Aazsamir\Libphpsky\Jetstream\Model\Kind;
use Aazsamir\Libphpsky\Jetstream\Model\Operation;
use WebSocket\Message\Message;

class MessageAdapter implements MessageAdapterInterface
{
    public function __construct(
        private TypeResolver $typeResolver,
    ) {}

    public static function default(): self
    {
        return new self(TypeResolver::default());
    }

    public function adapt(Message $message): Event
    {
        if (!$message instanceof \WebSocket\Message\Text) {
            throw new JetstreamException('Message is not a text message');
        }

        $message = $message->getContent();
        $message = json_decode(
            json: $message,
            associative: true,
            flags: \JSON_THROW_ON_ERROR,
        );

        if (!\is_array($message)) {
            throw new JetstreamException('Message is not a valid JSON');
        }

        if (!isset($message['kind']) || !\is_string($message['kind'])) {
            throw new JetstreamException('Invalid kind');
        }

        $kindEnum = Kind::tryFrom($message['kind']);

        if (!$kindEnum) {
            throw new JetstreamException('Invalid kind');
        }

        if (!isset($message['time_us']) || !\is_int($message['time_us'])) {
            throw new JetstreamException('Invalid time_us');
        }

        if (!isset($message['did']) || !\is_string($message['did'])) {
            throw new JetstreamException('Invalid did');
        }

        $timeUs = new \DateTimeImmutable('@' . (int) $message['time_us'] / 1_000_000);
        $did = $message['did'];

        switch (true) {
            case $kindEnum === Kind::COMMIT:
                if (
                    !isset($message['commit'])
                    || !\is_array($message['commit'])
                    || !isset($message['commit']['operation'])
                    || !\is_string($message['commit']['operation'])
                    || !isset($message['commit']['collection'])
                    || !\is_string($message['commit']['collection'])
                    || !isset($message['commit']['rkey'])
                    || !\is_string($message['commit']['rkey'])
                    || !isset($message['commit']['rev'])
                    || !\is_string($message['commit']['rev'])
                ) {
                    throw new JetstreamException('Invalid commit');
                }

                $commit = $message['commit'];
                $operation = Operation::from($commit['operation']);
                $record = $commit['record'] ?? null;

                if ($record) {
                    if (
                        !\is_array($record)
                        || !isset($record['$type'])
                        || !\is_string($record['$type'])
                        || !isset($commit['cid'])
                        || !\is_string($commit['cid'])
                    ) {
                        throw new JetstreamException('Invalid record');
                    }

                    $recordtype = $record['$type'];
                    $type = $this->typeResolver->resolve($recordtype);

                    if ($type) {
                        $record = $type::fromArray($record);
                    }

                    $cid = $commit['cid'];
                } else {
                    $record = null;
                    $cid = null;
                }

                return new CommitEvent(
                    did: $did,
                    timeUs: $timeUs,
                    kind: $kindEnum,
                    commit: new CommitCreate(
                        rev: $commit['rev'],
                        operation: $operation,
                        collection: $commit['collection'],
                        rkey: $commit['rkey'],
                        record: $record,
                        cid: $cid,
                    ),
                );

            case $kindEnum === Kind::IDENTITY:
                if (
                    !isset($message['identity'])
                    || !\is_array($message['identity'])
                    || !isset($message['identity']['did'])
                    || !\is_string($message['identity']['did'])
                    || !isset($message['identity']['handle'])
                    || !\is_string($message['identity']['handle'])
                    || !isset($message['identity']['seq'])
                    || !\is_int($message['identity']['seq'])
                    || !isset($message['identity']['time'])
                    || !\is_string($message['identity']['time'])
                ) {
                    throw new JetstreamException('Invalid identity');
                }

                return new IdentityEvent(
                    did: $did,
                    timeUs: $timeUs,
                    kind: $kindEnum,
                    identity: new Identity(
                        did: $message['identity']['did'],
                        handle: $message['identity']['handle'],
                        seq: $message['identity']['seq'],
                        time: new \DateTimeImmutable($message['identity']['time']),
                    ),
                );

            case $kindEnum === Kind::ACCOUNT: // @phpstan-ignore-line
                if (
                    !isset($message['account'])
                    || !\is_array($message['account'])
                    || !isset($message['account']['active'])
                    || !\is_bool($message['account']['active'])
                    || !isset($message['account']['did'])
                    || !\is_string($message['account']['did'])
                    || !isset($message['account']['seq'])
                    || !\is_int($message['account']['seq'])
                    || !isset($message['account']['time'])
                    || !\is_string($message['account']['time'])
                ) {
                    throw new JetstreamException('Invalid account');
                }

                return new AccountEvent(
                    did: $did,
                    timeUs: $timeUs,
                    kind: $kindEnum,
                    account: new Account(
                        active: $message['account']['active'],
                        did: $message['account']['did'],
                        seq: $message['account']['seq'],
                        time: new \DateTimeImmutable($message['account']['time']),
                    ),
                );
        }

        throw new JetstreamException('Invalid kind');
    }
}
