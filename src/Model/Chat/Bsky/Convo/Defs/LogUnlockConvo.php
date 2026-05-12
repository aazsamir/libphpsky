<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Event indicating a group convo was unlocked.
 * object
 */
class LogUnlockConvo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'logUnlockConvo';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageView A system message with data of type #systemMessageDataUnlockConvo */
    public ?SystemMessageView $message;

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic> Profiles referred in the system message. */
    public array $relatedProfiles = [];

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
        return ['rev', 'convoId', 'message', 'relatedProfiles'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic> $relatedProfiles
     */
    public static function new(
        string $rev,
        string $convoId,
        array $relatedProfiles,
        ?SystemMessageView $message = null,
    ): self {
        $instance = new self();
        $instance->rev = $rev;
        $instance->convoId = $convoId;
        $instance->relatedProfiles = $relatedProfiles;
        if ($message !== null) {
            $instance->message = $message;
        }

        return $instance;
    }
}
