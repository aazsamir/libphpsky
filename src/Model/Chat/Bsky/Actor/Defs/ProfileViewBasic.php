<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileViewBasic implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'profileViewBasic';
    public const ID = 'chat.bsky.actor.defs';

    public string $did;
    public string $handle;
    public ?string $displayName;
    public ?string $avatar;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileAssociated $associated;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ViewerState $viewer;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];

    /** @var ?bool Set to true when the actor cannot actively participate in conversations */
    public ?bool $chatDisabled;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\VerificationState $verification;

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
        return ['did', 'handle'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $did,
        string $handle,
        ?string $displayName = null,
        ?string $avatar = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileAssociated $associated = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ViewerState $viewer = null,
        ?array $labels = [],
        ?bool $chatDisabled = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\VerificationState $verification = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        if ($displayName !== null) {
            $instance->displayName = $displayName;
        }
        if ($avatar !== null) {
            $instance->avatar = $avatar;
        }
        if ($associated !== null) {
            $instance->associated = $associated;
        }
        if ($viewer !== null) {
            $instance->viewer = $viewer;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($chatDisabled !== null) {
            $instance->chatDisabled = $chatDisabled;
        }
        if ($verification !== null) {
            $instance->verification = $verification;
        }

        return $instance;
    }
}
