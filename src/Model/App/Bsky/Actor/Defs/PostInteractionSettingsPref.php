<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * Default post interaction settings for the account. These values should be applied as default values when creating new posts. These refs should mirror the threadgate and postgate records exactly.
 * object
 */
class PostInteractionSettingsPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'postInteractionSettingsPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowerRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\ListRule> Matches threadgate record. List of rules defining who can reply to this users posts. If value is an empty array, no one can reply. If value is undefined, anyone can reply. */
    public ?array $threadgateAllowRules = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Postgate\DisableRule> Matches postgate record. List of rules defining who can embed this users posts. If value is an empty array or is undefined, no particular rules apply and anyone can embed. */
    public ?array $postgateEmbeddingRules = [];

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return [];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowerRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\ListRule> $threadgateAllowRules
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Postgate\DisableRule> $postgateEmbeddingRules
     */
    public static function new(?array $threadgateAllowRules = [], ?array $postgateEmbeddingRules = []): self
    {
        $instance = new self();
        if ($threadgateAllowRules !== null) {
            $instance->threadgateAllowRules = $threadgateAllowRules;
        }
        if ($postgateEmbeddingRules !== null) {
            $instance->postgateEmbeddingRules = $postgateEmbeddingRules;
        }

        return $instance;
    }
}
