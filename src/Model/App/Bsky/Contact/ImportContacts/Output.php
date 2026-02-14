<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\ImportContacts;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.contact.importContacts';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Contact\Defs\MatchAndContactIndex> The users that matched during import and their indexes on the input contacts, so the client can correlate with its local list. */
    public array $matchesAndContactIndexes = [];

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
        return ['matchesAndContactIndexes'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Contact\Defs\MatchAndContactIndex> $matchesAndContactIndexes
     */
    public static function new(array $matchesAndContactIndexes): self
    {
        $instance = new self();
        $instance->matchesAndContactIndexes = $matchesAndContactIndexes;

        return $instance;
    }
}
