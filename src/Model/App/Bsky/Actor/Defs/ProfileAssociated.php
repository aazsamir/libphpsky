<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileAssociated implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'profileAssociated';
    public const ID = 'app.bsky.actor.defs';

    public ?int $lists;
    public ?int $feedgens;
    public ?int $starterPacks;
    public ?bool $labeler;
    public ?ProfileAssociatedChat $chat;
    public ?ProfileAssociatedActivitySubscription $activitySubscription;

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

    public static function new(
        ?int $lists = null,
        ?int $feedgens = null,
        ?int $starterPacks = null,
        ?bool $labeler = null,
        ?ProfileAssociatedChat $chat = null,
        ?ProfileAssociatedActivitySubscription $activitySubscription = null,
    ): self {
        $instance = new self();
        if ($lists !== null) {
            $instance->lists = $lists;
        }
        if ($feedgens !== null) {
            $instance->feedgens = $feedgens;
        }
        if ($starterPacks !== null) {
            $instance->starterPacks = $starterPacks;
        }
        if ($labeler !== null) {
            $instance->labeler = $labeler;
        }
        if ($chat !== null) {
            $instance->chat = $chat;
        }
        if ($activitySubscription !== null) {
            $instance->activitySubscription = $activitySubscription;
        }

        return $instance;
    }
}
