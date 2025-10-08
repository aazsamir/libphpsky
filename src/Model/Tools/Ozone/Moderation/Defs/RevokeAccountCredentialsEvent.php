<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Account credentials revocation by moderators. Only works on DID subjects.
 * object
 */
class RevokeAccountCredentialsEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'revokeAccountCredentialsEvent';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var string Comment describing the reason for the revocation. */
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
