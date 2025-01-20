<?php

declare(strict_types=1);

namespace Tests\Unit\Jetstream;

use Aazsamir\Libphpsky\Jetstream\Model\AccountEvent;
use Aazsamir\Libphpsky\Jetstream\Model\CommitEvent;
use Aazsamir\Libphpsky\Jetstream\Model\Event;
use Aazsamir\Libphpsky\Jetstream\Model\IdentityEvent;
use Aazsamir\Libphpsky\Jetstream\WssClient;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Like\Like;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\Unit\Jetstream\Stub\WebSocketClientFactoryStub;
use Tests\Unit\TestCase;
use WebSocket\Client;
use WebSocket\Message\Text;

class WssClientTest extends TestCase
{
    private Client&MockObject $client;
    private WssClient $wssClient;

    protected function setUp(): void
    {
        $this->client = $this->createMock(Client::class);
        $factory = new WebSocketClientFactoryStub($this->client);
        $this->wssClient = new WssClient($factory);
    }

    public function testCommitCreate(): void
    {
        $this->mockMessage([
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
        $event = $this->getEvent();

        $this->assertInstanceOf(CommitEvent::class, $event);
        $this->assertSame('did:plc:eygmaihciaxprqvxpfvl6flk', $event->did);
        $this->assertSame('2024-09-09T19:46:02+00:00', $event->timeUs->format(\DateTime::ATOM));
        $this->assertSame('3l3qo2vutsw2b', $event->commit->rev);
        $this->assertSame('create', $event->commit->operation->value);
        $this->assertSame('app.bsky.feed.like', $event->commit->collection);
        $this->assertSame('3l3qo2vuowo2b', $event->commit->rkey);
        /** @var Like $record */
        $record = $event->commit->record;
        $this->assertInstanceOf(Like::class, $record);
        $this->assertSame('2024-09-09T19:46:02+00:00', $record->createdAt->format(\DateTime::ATOM));
        $this->assertSame('bafyreidc6sydkkbchcyg62v77wbhzvb2mvytlmsychqgwf2xojjtirmzj4', $record->subject->cid);
        $this->assertSame('at://did:plc:wa7b35aakoll7hugkrjtf3xf/app.bsky.feed.post/3l3pte3p2e325', $record->subject->uri);
        $this->assertSame('bafyreidwaivazkwu67xztlmuobx35hs2lnfh3kolmgfmucldvhd3sgzcqi', $event->commit->cid);
    }

    public function testCommitDelete(): void
    {
        $this->mockMessage([
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
        $event = $this->getEvent();

        $this->assertInstanceOf(CommitEvent::class, $event);
        $this->assertSame('did:plc:rfov6bpyztcnedeyyzgfq42k', $event->did);
        $this->assertSame('2024-09-05T06:11:06+00:00', $event->timeUs->format(\DateTime::ATOM));
        $this->assertSame('3l3f6nzl3cv2s', $event->commit->rev);
        $this->assertSame('delete', $event->commit->operation->value);
        $this->assertSame('app.bsky.graph.follow', $event->commit->collection);
        $this->assertSame('3l3dn7tku762u', $event->commit->rkey);
        $this->assertNull($event->commit->record);
        $this->assertNull($event->commit->cid);
    }

    public function testIdentity(): void
    {
        $this->mockMessage([
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
        $event = $this->getEvent();

        $this->assertInstanceOf(IdentityEvent::class, $event);
        $this->assertSame('did:plc:ufbl4k27gp6kzas5glhz7fim', $event->did);
        $this->assertSame('2024-09-05T06:11:05+00:00', $event->timeUs->format(\DateTime::ATOM));
        $this->assertSame('did:plc:ufbl4k27gp6kzas5glhz7fim', $event->identity->did);
        $this->assertSame('yohenrique.bsky.social', $event->identity->handle);
        $this->assertSame(1409752997, $event->identity->seq);
        $this->assertSame('2024-09-05T06:11:04+00:00', $event->identity->time->format(\DateTime::ATOM));
    }

    public function testAccount(): void
    {
        $this->mockMessage([
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

        /** @var AccountEvent $event */
        $event = $this->getEvent();

        $this->assertInstanceOf(AccountEvent::class, $event);
        $this->assertSame('did:plc:ufbl4k27gp6kzas5glhz7fim', $event->did);
        $this->assertSame('2024-09-05T06:11:05+00:00', $event->timeUs->format(\DateTime::ATOM));
        $this->assertTrue($event->account->active);
        $this->assertSame('did:plc:ufbl4k27gp6kzas5glhz7fim', $event->account->did);
        $this->assertSame(1409753013, $event->account->seq);
        $this->assertSame('2024-09-05T06:11:04+00:00', $event->account->time->format(\DateTime::ATOM));
    }

    private function mockMessage(array $data): void
    {
        $message = new Text(json_encode($data));

        $this->client
            ->expects($this->once())
            ->method('receive')
            ->willReturn($message);
    }

    private function getEvent(): Event
    {
        foreach ($this->wssClient->subscribe() as $event) {
            $this->wssClient->stop();
        }

        return $event;
    }
}
