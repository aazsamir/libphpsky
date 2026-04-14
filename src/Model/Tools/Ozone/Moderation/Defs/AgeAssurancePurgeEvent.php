<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Purges all age assurance events for the subject. Only works on DID subjects. Moderator-only.
 * object
 */
class AgeAssurancePurgeEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'ageAssurancePurgeEvent';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var string Comment describing the reason for the purge. */
    public string $comment;

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
        return ['comment'];
    }

    public static function new(string $comment): self
    {
        $instance = new self();
        $instance->comment = $comment;

        return $instance;
    }
}
