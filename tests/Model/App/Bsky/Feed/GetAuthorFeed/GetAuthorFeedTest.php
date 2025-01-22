<?php

declare(strict_types=1);

namespace Tests\Model\App\Bsky\Feed\GetAuthorFeed;

use Tests\Model\TestCase;

class GetAuthorFeedTest extends TestCase
{
    public function testQuery(): void
    {
        $this->mockResponse($this->jsonres($this->valid()));

        $response = $this->client->appBskyFeedGetAuthorFeed()->query('bsky.app');

        $this->assertEquals('2025-01-17T21:08:17.119Z', $response->cursor);
        $this->assertNotEmpty($response->feed);
        $feed = $response->feed[0];
        $this->assertNotEmpty($feed->post);
        $post = $feed->post;
        $this->assertEquals('at://did:plc:z72i7hdynmk6r22z27h6tvur/app.bsky.feed.post/3lfxpbo2kss24', $post->uri);
        $this->assertEquals('bafyreifejgadai2i2un3uwvgly3c7oanrrxbvdbwf76vm2tx5m2r54yi5i', $post->cid);
        $this->assertNotEmpty($post->author);
        $author = $post->author;
        $this->assertEquals('did:plc:z72i7hdynmk6r22z27h6tvur', $author->did);
        $this->assertEquals('bsky.app', $author->handle);
        $this->assertEquals('Bluesky', $author->displayName);
        $this->assertEquals('https://cdn.bsky.app/img/avatar/plain/did:plc:z72i7hdynmk6r22z27h6tvur/bafkreihagr2cmvl2jt4mgx3sppwe2it3fwolkrbtjrhcnwjk4jdijhsoze@jpeg', $author->avatar);
        $this->assertNull($author->associated);
        $this->assertNotEmpty($author->viewer);
        $viewer = $author->viewer;
        $this->assertFalse($viewer->muted);
        $this->assertFalse($viewer->blockedBy);
        $this->assertEquals('at://did:plc:rbkeag6b36ghkibhr6x235pm/app.bsky.graph.follow/3lbqa536lgt2c', $viewer->following);
        $this->assertEmpty($author->labels);
        $this->assertEquals('2023-04-12T04:53:57+00:00', $author->createdAt->format(\DateTime::ATOM));
        $record = $post->record;
        $this->assertInstanceOf(\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post\Post::class, $record);
        $this->assertEquals('2025-01-17T21:08:17+00:00', $record->createdAt->format(\DateTime::ATOM));
        $this->assertEquals(['en'], $record->langs);
        $this->assertNotEmpty($record->text);
        $this->assertEquals(1226, $post->replyCount);
        $this->assertEquals(3119, $post->repostCount);
        $this->assertEquals(29092, $post->likeCount);
        $this->assertEquals(247, $post->quoteCount);
        $this->assertEquals('2025-01-17T21:08:17+00:00', $post->indexedAt->format(\DateTime::ATOM));
        $viewer = $post->viewer;
        $this->assertFalse($viewer->threadMuted);
        $this->assertFalse($viewer->embeddingDisabled);
        $this->assertEmpty($post->labels);
    }

    private function valid(): string
    {
        return <<<'JSON'
        {
            "feed": [
                {
                    "post": {
                        "uri": "at://did:plc:z72i7hdynmk6r22z27h6tvur/app.bsky.feed.post/3lfxpbo2kss24",
                        "cid": "bafyreifejgadai2i2un3uwvgly3c7oanrrxbvdbwf76vm2tx5m2r54yi5i",
                        "author": {
                            "did": "did:plc:z72i7hdynmk6r22z27h6tvur",
                            "handle": "bsky.app",
                            "displayName": "Bluesky",
                            "avatar": "https://cdn.bsky.app/img/avatar/plain/did:plc:z72i7hdynmk6r22z27h6tvur/bafkreihagr2cmvl2jt4mgx3sppwe2it3fwolkrbtjrhcnwjk4jdijhsoze@jpeg",
                            "associated": null,
                            "viewer": {
                                "muted": false,
                                "blockedBy": false,
                                "following": "at://did:plc:rbkeag6b36ghkibhr6x235pm/app.bsky.graph.follow/3lbqa536lgt2c"
                            },
                            "labels": [],
                            "createdAt": "2023-04-12T04:53:57.057Z"
                        },
                        "record": {
                            "$type": "app.bsky.feed.post",
                            "createdAt": "2025-01-17T21:08:17.119Z",
                            "langs": [
                                "en"
                            ],
                            "text": "📢 Bluesky 1.96.5 rolling out now A couple of quick updates for everybody! Have a great weekend! • On desktop web, clicking your profile pic now opens a quick account switcher\n• You can now report a DM conversation without opening it\n• Improvements to gestures on Android"
                        },
                        "replyCount": 1226,
                        "repostCount": 3119,
                        "likeCount": 29092,
                        "quoteCount": 247,
                        "indexedAt": "2025-01-17T21:08:17.654Z",
                        "viewer": {
                            "threadMuted": false,
                            "embeddingDisabled": false
                        },
                        "labels": []
                    }
                }
            ],
            "cursor": "2025-01-17T21:08:17.119Z"
        }
        JSON;
    }
}
