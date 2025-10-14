<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadV2;

/**
 * (NOTE: this endpoint is under development and WILL change without notice. Don't use it until it is moved out of `unspecced` or your application WILL break) Get posts in a thread. It is based in an anchor post at any depth of the tree, and returns posts above it (recursively resolving the parent, without further branching to their replies) and below it (recursive replies, with branching to their replies). Does not require auth, but additional metadata and filtering will be applied for authed requests.
 * query
 */
class GetPostThreadV2 implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getPostThreadV2';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $anchor Reference (AT-URI) to post record. This is the anchor post, and the thread will be built around it. It can be any post in the tree, not necessarily a root post.
     * @param ?bool $above Whether to include parents above the anchor.
     * @param ?int $below How many levels of replies to include below the anchor.
     * @param ?int $branchingFactor Maximum of replies to include at each level of the thread, except for the direct replies to the anchor, which are (NOTE: currently, during unspecced phase) all returned (NOTE: later they might be paginated).
     * @param ?bool $prioritizeFollowedUsers Whether to prioritize posts from followed users. It only has effect when the user is authenticated.
     * @param ?string $sort Sorting for the thread replies.
     */
    public function query(
        string $anchor,
        ?bool $above = null,
        ?int $below = null,
        ?int $branchingFactor = null,
        ?bool $prioritizeFollowedUsers = null,
        ?string $sort = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadV2\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $anchor Reference (AT-URI) to post record. This is the anchor post, and the thread will be built around it. It can be any post in the tree, not necessarily a root post.
     * @param ?bool $above Whether to include parents above the anchor.
     * @param ?int $below How many levels of replies to include below the anchor.
     * @param ?int $branchingFactor Maximum of replies to include at each level of the thread, except for the direct replies to the anchor, which are (NOTE: currently, during unspecced phase) all returned (NOTE: later they might be paginated).
     * @param ?bool $prioritizeFollowedUsers Whether to prioritize posts from followed users. It only has effect when the user is authenticated.
     * @param ?string $sort Sorting for the thread replies.
     * @return array<string, mixed>
     */
    public function rawQuery(
        string $anchor,
        ?bool $above = null,
        ?int $below = null,
        ?int $branchingFactor = null,
        ?bool $prioritizeFollowedUsers = null,
        ?string $sort = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
