<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\Defs;

/**
 * object
 */
class SyncStatus implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'syncStatus';
    public const ID = 'app.bsky.contact.defs';

    /** @var \DateTimeInterface Last date when contacts where imported. */
    public \DateTimeInterface $syncedAt;

    /** @var int Number of existing contact matches resulting of the user imports and of their imported contacts having imported the user. Matches stop being counted when the user either follows the matched contact or dismisses the match. */
    public int $matchesCount;

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
        return ['syncedAt', 'matchesCount'];
    }

    public static function new(\DateTimeInterface $syncedAt, int $matchesCount): self
    {
        $instance = new self();
        $instance->syncedAt = $syncedAt;
        $instance->matchesCount = $matchesCount;

        return $instance;
    }
}
