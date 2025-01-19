<?php

declare(strict_types=1);

namespace Tests\Model\App\Bsky\Actor\GetProfile;

use Tests\Model\TestCase;

class GetProfileTest extends TestCase
{
    public function testQuery(): void
    {
        $this->mockResponse($this->jsonres($this->valid()));

        $response = $this->client->appBskyActorGetProfile('actor');

        $this->assertEquals('did:plc:z72i7hdynmk6r22z27h6tvur', $response->did);
        $this->assertEquals('bsky.app', $response->handle);
        $this->assertEquals('Bluesky', $response->displayName);
        $this->assertEquals('https://cdn.bsky.app/img/avatar/plain/did:plc:z72i7hdynmk6r22z27h6tvur/bafkreihagr2cmvl2jt4mgx3sppwe2it3fwolkrbtjrhcnwjk4jdijhsoze@jpeg', $response->avatar);
        $this->assertEquals(2, $response->associated->lists);
        $this->assertEquals(6, $response->associated->feedgens);
        $this->assertEquals(0, $response->associated->starterPacks);
        $this->assertEquals(false, $response->associated->labeler);
        $this->assertEquals('none', $response->associated->chat->allowIncoming);
        $this->assertEquals(false, $response->viewer->muted);
        $this->assertEquals(false, $response->viewer->blockedBy);
        $this->assertEquals('at://did:plc:rbkeag6b36ghkibhr6x235pm/app.bsky.graph.follow/3lbqa536lgt2c', $response->viewer->following);
        $this->assertEquals(1, $response->viewer->knownFollowers->count);
        $this->assertEquals('did:plc:ec5rvyvs72wkb3nrmsoyynwv', $response->viewer->knownFollowers->followers[0]->did);
        $this->assertEquals('kwark-powabny.bsky.social', $response->viewer->knownFollowers->followers[0]->handle);
        $this->assertEquals('Kot Schrödingera', $response->viewer->knownFollowers->followers[0]->displayName);
        $this->assertEquals('https://cdn.bsky.app/img/avatar/plain/did:plc:ec5rvyvs72wkb3nrmsoyynwv/bafkreiggq7vcrdz52mqfskwtz4svwegxhavlrww7bt3qawqivb7h7x5fuu@jpeg', $response->viewer->knownFollowers->followers[0]->avatar);
        $this->assertEquals(false, $response->viewer->knownFollowers->followers[0]->viewer->muted);
        $this->assertEquals(false, $response->viewer->knownFollowers->followers[0]->viewer->blockedBy);
        $this->assertEquals('at://did:plc:rbkeag6b36ghkibhr6x235pm/app.bsky.graph.follow/3lbqa7x2dgn2n', $response->viewer->knownFollowers->followers[0]->viewer->following);
        $this->assertEquals([], $response->viewer->knownFollowers->followers[0]->labels);
        $this->assertEquals('2024-11-15T19:10:19+00:00', $response->viewer->knownFollowers->followers[0]->createdAt->format(\DateTimeInterface::ATOM));
        $this->assertEquals([], $response->labels);
        $this->assertEquals('2023-04-12T04:53:57+00:00', $response->createdAt->format(\DateTimeInterface::ATOM), );
        $this->assertEquals('official Bluesky account (check username👆) Bugs, feature requests, feedback: support@bsky.app', $response->description);
        $this->assertEquals('2024-12-18T07:43:57+00:00', $response->indexedAt->format(\DateTimeInterface::ATOM));
        $this->assertEquals('https://cdn.bsky.app/img/banner/plain/did:plc:z72i7hdynmk6r22z27h6tvur/bafkreichzyovokfzmymz36p5jibbjrhsur6n7hjnzxrpbt5jaydp2szvna@jpeg', $response->banner);
        $this->assertEquals(20356754, $response->followersCount);
        $this->assertEquals(2, $response->followsCount);
        $this->assertEquals(485, $response->postsCount);
        $this->assertEquals('bafyreicnt42y6vo6pfpvyro234ac4o6ijug6adwwrh7awflgrqlt4zibxq', $response->pinnedPost->cid);
        $this->assertEquals('at://did:plc:z72i7hdynmk6r22z27h6tvur/app.bsky.feed.post/3l6oveex3ii2l', $response->pinnedPost->uri);
    }

    private function valid(): string
    {
        return <<<JSON
            {
                "did": "did:plc:z72i7hdynmk6r22z27h6tvur",
                "handle": "bsky.app",
                "displayName": "Bluesky",
                "avatar": "https://cdn.bsky.app/img/avatar/plain/did:plc:z72i7hdynmk6r22z27h6tvur/bafkreihagr2cmvl2jt4mgx3sppwe2it3fwolkrbtjrhcnwjk4jdijhsoze@jpeg",
                "associated": {
                    "lists": 2,
                    "feedgens": 6,
                    "starterPacks": 0,
                    "labeler": false,
                    "chat": {
                        "allowIncoming": "none"
                    }
                },
                "viewer": {
                    "muted": false,
                    "blockedBy": false,
                    "following": "at://did:plc:rbkeag6b36ghkibhr6x235pm/app.bsky.graph.follow/3lbqa536lgt2c",
                    "knownFollowers": {
                        "count": 1,
                        "followers": [
                            {
                                "did": "did:plc:ec5rvyvs72wkb3nrmsoyynwv",
                                "handle": "kwark-powabny.bsky.social",
                                "displayName": "Kot Schrödingera",
                                "avatar": "https://cdn.bsky.app/img/avatar/plain/did:plc:ec5rvyvs72wkb3nrmsoyynwv/bafkreiggq7vcrdz52mqfskwtz4svwegxhavlrww7bt3qawqivb7h7x5fuu@jpeg",
                                "viewer": {
                                    "muted": false,
                                    "blockedBy": false,
                                    "following": "at://did:plc:rbkeag6b36ghkibhr6x235pm/app.bsky.graph.follow/3lbqa7x2dgn2n"
                                },
                                "labels": [],
                                "createdAt": "2024-11-15T19:10:19.529Z"
                            }
                        ]
                    }
                },
                "labels": [],
                "createdAt": "2023-04-12T04:53:57.057Z",
                "description": "official Bluesky account (check username👆)\n\nBugs, feature requests, feedback: support@bsky.app",
                "indexedAt": "2024-12-18T07:43:57.542Z",
                "banner": "https://cdn.bsky.app/img/banner/plain/did:plc:z72i7hdynmk6r22z27h6tvur/bafkreichzyovokfzmymz36p5jibbjrhsur6n7hjnzxrpbt5jaydp2szvna@jpeg",
                "followersCount": 20356754,
                "followsCount": 2,
                "postsCount": 485,
                "pinnedPost": {
                    "cid": "bafyreicnt42y6vo6pfpvyro234ac4o6ijug6adwwrh7awflgrqlt4zibxq",
                    "uri": "at://did:plc:z72i7hdynmk6r22z27h6tvur/app.bsky.feed.post/3l6oveex3ii2l"
                }
            }
        JSON;
    }
}