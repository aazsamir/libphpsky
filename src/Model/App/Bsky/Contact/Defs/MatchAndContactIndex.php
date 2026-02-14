<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\Defs;

/**
 * Associates a profile with the positional index of the contact import input in the call to `app.bsky.contact.importContacts`, so clients can know which phone caused a particular match.
 * object
 */
class MatchAndContactIndex implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'matchAndContactIndex';
    public const ID = 'app.bsky.contact.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView Profile of the matched user. */
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $match;

    /** @var int The index of this match in the import contact input. */
    public int $contactIndex;

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
        return ['match', 'contactIndex'];
    }

    public static function new(
        int $contactIndex,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $match = null,
    ): self {
        $instance = new self();
        $instance->contactIndex = $contactIndex;
        if ($match !== null) {
            $instance->match = $match;
        }

        return $instance;
    }
}
