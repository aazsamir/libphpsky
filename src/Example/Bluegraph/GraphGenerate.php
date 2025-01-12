<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Example\Bluegraph;

use Aazsamir\Libphpsky\ATProto\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView;
use Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewDetailed;
use Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetProfile\GetProfile;
use Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetProfiles\GetProfiles;
use Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetAuthorFeed\GetAuthorFeed;
use Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetLikes\GetLikes;
use Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Like\Like;
use Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle;
use Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListRecords\ListRecords;
use Aazsamir\Libphpsky\ATProto\Utils\ATUri\ATUri;

/**
 * This is example code to generate a graph of people who liked our posts and their likes. It can be used further to visualize the graph using Graphviz or any other graph visualization tool.
 */
class GraphGenerate
{
    private ResolveHandle $resolveHandle;
    private GetAuthorFeed $authorFeed;
    private GetLikes $getLikes;
    private ListRecords $listRecords;
    private GetProfiles $getProfiles;
    private GetProfile $getProfile;

    public function __construct()
    {
        $client = ATProtoClientBuilder::default()->useAsync(true)->useQueryCache(true)->build();
        $this->resolveHandle = new ResolveHandle($client);
        $this->authorFeed = new GetAuthorFeed($client);
        $this->getLikes = new GetLikes($client);
        $this->listRecords = new ListRecords($client);
        $this->getProfiles = new GetProfiles($client);
        $this->getProfile = new GetProfile($client);
    }

    public function generate(string $handle): void
    {
        $self = $this->getMyself($handle);
        $myLikers = $this->getMyLikers($self);
        $otherLiked = $this->getOtherLiked($myLikers);

        $allLikedPersons = array_merge(...array_values($otherLiked));
        $allMyLikers = array_keys($myLikers);
        /** @var string[] $allLikedPersons */
        $allLikedPersons = array_values(array_unique(array_merge($allLikedPersons, $allMyLikers)));
        $profiles = $this->getProfiles($allLikedPersons);

        $graph = $this->createGraph($self, $myLikers, $otherLiked, $profiles);
        file_put_contents('graph.dot', $graph->toDot());
    }

    private function getMyself(string $handle): ProfileViewDetailed
    {
        $resolved = $this->resolveHandle->query($handle);
        $resolved = $resolved->did;

        return $this->getProfile->query($resolved);
    }

    /**
     * @return ProfileView[]
     */
    private function getMyLikers(ProfileViewDetailed $myself): array
    {
        $feed = $this->authorFeed->query($myself->did);

        $myLikers = [];
        $futures = [];

        foreach ($feed->feed as $feedPost) {
            if ($feedPost->post === null) {
                continue;
            }

            $futures[] = \Amp\async(function () use ($feedPost) {
                return $this->getLikes->query(
                    uri: $feedPost->post->uri,
                );
            });
        }

        /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetLikes\Output[] $likes */
        [$errors, $likes] = \Amp\Future\awaitAll($futures);

        if ($errors) {
            dd($errors);
        }

        foreach ($likes as $like) {
            foreach ($like->likes as $like) {
                if ($like->actor !== null) {
                    $myLikers[$like->actor->did] = $like->actor;
                }
            }
        }

        return $myLikers;
    }

    /**
     * @param ProfileView[] $myLikers
     *
     * @return string[][]
     */
    private function getOtherLiked(array $myLikers): array
    {
        $otherLiked = [];
        $futures = [];

        foreach ($myLikers as $myLiker) {
            $futures[] = \Amp\async(function () use ($myLiker) {
                return $this->listRecords->query(
                    repo: $myLiker->did,
                    collection: 'app.bsky.feed.like',
                    limit: 100,
                );
            });
        }

        /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListRecords\Output[] $records[] */
        [$errors, $records] = \Amp\Future\awaitAll($futures);

        if ($errors) {
            dd($errors);
        }

        foreach ($records as $recordResponse) {
            foreach ($recordResponse->records as $record) {
                if ($record->value instanceof Like && $record->value->subject) {
                    $liked = ATUri::fromString($record->value->subject->uri);
                    $liking = ATUri::fromString($record->uri);
                    $otherLiked[$liking->getDid()][] = $liked->getDid();
                }
            }
        }

        return $otherLiked;
    }

    /**
     * @param string[] $dids
     *
     * @return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetProfiles\Output[]
     */
    private function getProfiles(array $dids): array
    {
        $futures = [];

        foreach (array_chunk($dids, 20) as $chunk) {
            $futures[] = \Amp\async(fn () => $this->getProfiles->query($chunk));
        }

        /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetProfiles\Output[] $profiles[] */
        [$errors, $profiles] = \Amp\Future\awaitAll($futures);

        if ($errors) {
            dd($errors);
        }

        return $profiles;
    }

    /**
     * @param ProfileView[] $myLikers
     * @param string[][] $otherLiked
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetProfiles\Output[] $profiles
     */
    private function createGraph(
        ProfileViewDetailed $myself,
        array $myLikers,
        array $otherLiked,
        array $profiles,
    ): Graph {
        $graph = new Graph();

        $graph->addNode($myself->handle, ['posts' => $myself->postsCount, 'followers' => $myself->followersCount, 'description' => $this->trimDescription($myself->description)]);

        foreach ($myLikers as $myLiker) {
            $graph->addEdge($myself->handle, $myLiker->handle);
        }

        foreach ($profiles as $profileResponse) {
            foreach ($profileResponse->profiles as $profile) {
                $graph->addNode($profile->handle, ['posts' => $profile->postsCount, 'followers' => $profile->followersCount, 'description' => $this->trimDescription($profile->description)]);

                foreach ($otherLiked as $likingPersonDid => $likedPersonDids) {
                    if (\in_array($profile->did, $likedPersonDids, true) && isset($myLikers[$likingPersonDid])) {
                        $graph->addEdge($myLikers[$likingPersonDid]->handle, $profile->handle);
                    }
                }
            }
        }

        return $graph;
    }

    private function trimDescription(?string $description): string
    {
        $description = preg_replace('/\s+/', ' ', $description ?? '');

        return $description ?? '';
    }
}
