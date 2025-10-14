<?php

declare(strict_types=1);

namespace Tests\Unit\Jetstream;

use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\Libphpsky\Jetstream\MessageAdapter;
use Aazsamir\Libphpsky\Jetstream\Model\AccountEvent;
use Aazsamir\Libphpsky\Jetstream\Model\CommitEvent;
use Aazsamir\Libphpsky\Jetstream\Model\IdentityEvent;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Like\Like;
use Tests\Unit\TestCase;
use WebSocket\Message\Text;

/**
 * @internal
 */
final class MessageAdapterTest extends TestCase
{
    private MessageAdapter $adapter;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adapter = new MessageAdapter(
            TypeResolver::default(),
        );
    }

    public function testCommitCreate(): void
    {
        $message = $this->mockMessage([
            'did' => 'did:plc:eygmaihciaxprqvxpfvl6flk',
            'time_us' => 1725911162329308,
            'kind' => 'commit',
            'commit' => [
                'rev' => '3l3qo2vutsw2b',
                'operation' => 'create',
                'collection' => 'app.bsky.feed.like',
                'rkey' => '3l3qo2vuowo2b',
                'record' => [
                    '$type' => 'app.bsky.feed.like',
                    'createdAt' => '2024-09-09T19:46:02.102Z',
                    'subject' => [
                        'cid' => 'bafyreidc6sydkkbchcyg62v77wbhzvb2mvytlmsychqgwf2xojjtirmzj4',
                        'uri' => 'at://did:plc:wa7b35aakoll7hugkrjtf3xf/app.bsky.feed.post/3l3pte3p2e325',
                    ],
                ],
                'cid' => 'bafyreidwaivazkwu67xztlmuobx35hs2lnfh3kolmgfmucldvhd3sgzcqi',
            ],
        ]);

        /** @var CommitEvent $event */
        $event = $this->adapter->adapt($message);

        self::assertInstanceOf(CommitEvent::class, $event);
        self::assertSame('did:plc:eygmaihciaxprqvxpfvl6flk', $event->did);
        self::assertSame('2024-09-09T19:46:02+00:00', $event->timeUs->format(\DateTime::ATOM));
        self::assertSame('3l3qo2vutsw2b', $event->commit->rev);
        self::assertSame('create', $event->commit->operation->value);
        self::assertSame('app.bsky.feed.like', $event->commit->collection);
        self::assertSame('3l3qo2vuowo2b', $event->commit->rkey);
        /** @var Like $record */
        $record = $event->commit->record;
        self::assertInstanceOf(Like::class, $record);
        self::assertSame('2024-09-09T19:46:02+00:00', $record->createdAt->format(\DateTime::ATOM));
        self::assertSame('bafyreidc6sydkkbchcyg62v77wbhzvb2mvytlmsychqgwf2xojjtirmzj4', $record->subject->cid);
        self::assertSame('at://did:plc:wa7b35aakoll7hugkrjtf3xf/app.bsky.feed.post/3l3pte3p2e325', $record->subject->uri);
        self::assertSame('bafyreidwaivazkwu67xztlmuobx35hs2lnfh3kolmgfmucldvhd3sgzcqi', $event->commit->cid);
    }

    public function testCommitDelete(): void
    {
        $message = $this->mockMessage([
            'did' => 'did:plc:rfov6bpyztcnedeyyzgfq42k',
            'time_us' => 1725516666833633,
            'kind' => 'commit',
            'commit' => [
                'rev' => '3l3f6nzl3cv2s',
                'operation' => 'delete',
                'collection' => 'app.bsky.graph.follow',
                'rkey' => '3l3dn7tku762u',
            ],
        ]);

        /** @var CommitEvent $event */
        $event = $this->adapter->adapt($message);

        self::assertInstanceOf(CommitEvent::class, $event);
        self::assertSame('did:plc:rfov6bpyztcnedeyyzgfq42k', $event->did);
        self::assertSame('2024-09-05T06:11:06+00:00', $event->timeUs->format(\DateTime::ATOM));
        self::assertSame('3l3f6nzl3cv2s', $event->commit->rev);
        self::assertSame('delete', $event->commit->operation->value);
        self::assertSame('app.bsky.graph.follow', $event->commit->collection);
        self::assertSame('3l3dn7tku762u', $event->commit->rkey);
        self::assertNull($event->commit->record);
        self::assertNull($event->commit->cid);
    }

    public function testIdentity(): void
    {
        $message = $this->mockMessage([
            'did' => 'did:plc:ufbl4k27gp6kzas5glhz7fim',
            'time_us' => 1725516665234703,
            'kind' => 'identity',
            'identity' => [
                'did' => 'did:plc:ufbl4k27gp6kzas5glhz7fim',
                'handle' => 'yohenrique.bsky.social',
                'seq' => 1409752997,
                'time' => '2024-09-05T06:11:04.870Z',
            ],
        ]);

        /** @var IdentityEvent $event */
        $event = $this->adapter->adapt($message);

        self::assertInstanceOf(IdentityEvent::class, $event);
        self::assertSame('did:plc:ufbl4k27gp6kzas5glhz7fim', $event->did);
        self::assertSame('2024-09-05T06:11:05+00:00', $event->timeUs->format(\DateTime::ATOM));
        self::assertSame('did:plc:ufbl4k27gp6kzas5glhz7fim', $event->identity->did);
        self::assertSame('yohenrique.bsky.social', $event->identity->handle);
        self::assertSame(1409752997, $event->identity->seq);
        self::assertSame('2024-09-05T06:11:04+00:00', $event->identity->time->format(\DateTime::ATOM));
    }

    public function testAccount(): void
    {
        $message = $this->mockMessage([
            'did' => 'did:plc:ufbl4k27gp6kzas5glhz7fim',
            'time_us' => 1725516665333808,
            'kind' => 'account',
            'account' => [
                'active' => true,
                'did' => 'did:plc:ufbl4k27gp6kzas5glhz7fim',
                'seq' => 1409753013,
                'time' => '2024-09-05T06:11:04.870Z',
            ],
        ]);

        $event = $this->adapter->adapt($message);

        self::assertInstanceOf(AccountEvent::class, $event);
        self::assertSame('did:plc:ufbl4k27gp6kzas5glhz7fim', $event->did);
        self::assertSame('2024-09-05T06:11:05+00:00', $event->timeUs->format(\DateTime::ATOM));
        self::assertTrue($event->account->active);
        self::assertSame('did:plc:ufbl4k27gp6kzas5glhz7fim', $event->account->did);
        self::assertSame(1409753013, $event->account->seq);
        self::assertSame('2024-09-05T06:11:04+00:00', $event->account->time->format(\DateTime::ATOM));
    }

    public function testCommitUnknownType(): void
    {
        $record = [
            '$type' => 'totally.unknown.collection.record',
            'createdAt' => '2024-09-09T19:46:02.102Z',
            'subject' => [
                'something' => 'else',
            ],
        ];
        $message = $this->mockMessage([
            'did' => 'did:plc:eygmaihciaxprqvxpfvl6flk',
            'time_us' => 1725911162329308,
            'kind' => 'commit',
            'commit' => [
                'rev' => '3l3qo2vutsw2b',
                'operation' => 'create',
                'collection' => 'totally.unknown.collection',
                'rkey' => '3l3qo2vuowo2b',
                'record' => $record,
                'cid' => 'bafyreidwaivazkwu67xztlmuobx35hs2lnfh3kolmgfmucldvhd3sgzcqi',
            ],
        ]);

        /** @var CommitEvent $event */
        $event = $this->adapter->adapt($message);

        self::assertInstanceOf(CommitEvent::class, $event);
        self::assertSame('did:plc:eygmaihciaxprqvxpfvl6flk', $event->did);
        self::assertSame('2024-09-09T19:46:02+00:00', $event->timeUs->format(\DateTime::ATOM));
        self::assertSame('3l3qo2vutsw2b', $event->commit->rev);
        self::assertSame('create', $event->commit->operation->value);
        self::assertSame('totally.unknown.collection', $event->commit->collection);
        self::assertSame('3l3qo2vuowo2b', $event->commit->rkey);
        self::assertSame($record, $event->commit->record);
    }

    private function mockMessage(array $data): Text
    {
        return new Text(json_encode($data));
    }
}
