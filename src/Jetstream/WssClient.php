<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream;

use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\Libphpsky\Jetstream\Model\Account;
use Aazsamir\Libphpsky\Jetstream\Model\AccountEvent;
use Aazsamir\Libphpsky\Jetstream\Model\CommitCreate;
use Aazsamir\Libphpsky\Jetstream\Model\CommitEvent;
use Aazsamir\Libphpsky\Jetstream\Model\Identity;
use Aazsamir\Libphpsky\Jetstream\Model\IdentityEvent;
use Aazsamir\Libphpsky\Jetstream\Model\Kind;
use Aazsamir\Libphpsky\Jetstream\Model\Operation;

class WssClient implements Client
{
    private bool $stop = false;

    public function __construct(
        private WebSocketClientFactory $clientFactory,
    ) {}

    public function subscribe(
        array $wantedCollections = [],
        array $wantedDids = [],
        ?int $maxMessageSizeBytes = null,
        ?string $cursor = null,
    ): \Generator {
        $args = [];

        if ($wantedCollections) {
            $args['wantedCollections'] = $wantedCollections;
        }

        if ($wantedDids) {
            $args['wantedDids'] = $wantedDids;
        }

        if ($maxMessageSizeBytes) {
            $args['maxMessageSizeBytes'] = $maxMessageSizeBytes;
        }

        if ($cursor) {
            $args['cursor'] = $cursor;
        }

        $client = $this->clientFactory->create($args);

        while ($this->stop === false) {
            $message = $client->receive();

            if ($message instanceof \WebSocket\Message\Text) {
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

                $timeUs = new \DateTimeImmutable('@' . $message['time_us']);
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
                            $type = TypeResolver::resolve($recordtype);

                            if (!$type) {
                                throw new JetstreamException('Invalid record type ' . $recordtype);
                            }

                            $record = $type::fromArray($record);
                            $cid = $commit['cid'];
                        } else {
                            $record = null;
                            $cid = null;
                        }

                        $commit = new CommitCreate(
                            rev: $commit['rev'],
                            operation: $operation,
                            collection: $commit['collection'],
                            rkey: $commit['rkey'],
                            record: $record,
                            cid: $cid,
                        );

                        yield new CommitEvent(
                            did: $did,
                            timeUs: $timeUs,
                            kind: $kindEnum,
                            commit: $commit,
                        );

                        break;

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

                        yield new IdentityEvent(
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

                        break;

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

                        yield new AccountEvent(
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

                        break;
                }
            }
        }

        $this->stop = false;

        $client->close();
    }

    public function stop(): void
    {
        $this->stop = true;
    }
}
