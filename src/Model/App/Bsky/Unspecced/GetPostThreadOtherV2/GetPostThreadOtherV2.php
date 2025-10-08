<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadOtherV2;

/**
 * (NOTE: this endpoint is under development and WILL change without notice. Don't use it until it is moved out of `unspecced` or your application WILL break) Get additional posts under a thread e.g. replies hidden by threadgate. Based on an anchor post at any depth of the tree, returns top-level replies below that anchor. It does not include ancestors nor the anchor itself. This should be called after exhausting `app.bsky.unspecced.getPostThreadV2`. Does not require auth, but additional metadata and filtering will be applied for authed requests.
 * query
 */
class GetPostThreadOtherV2 implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getPostThreadOtherV2';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $anchor Reference (AT-URI) to post record. This is the anchor post.
     * @param ?bool $prioritizeFollowedUsers Whether to prioritize posts from followed users. It only has effect when the user is authenticated.
     */
    public function query(string $anchor, ?bool $prioritizeFollowedUsers = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadOtherV2\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $anchor Reference (AT-URI) to post record. This is the anchor post.
     * @param ?bool $prioritizeFollowedUsers Whether to prioritize posts from followed users. It only has effect when the user is authenticated.
     * @return array<string, mixed>
     */
    public function rawQuery(string $anchor, ?bool $prioritizeFollowedUsers = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
