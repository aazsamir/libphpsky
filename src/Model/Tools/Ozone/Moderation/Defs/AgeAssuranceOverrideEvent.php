<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Age assurance status override by moderators. Only works on DID subjects.
 * object
 */
class AgeAssuranceOverrideEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'ageAssuranceOverrideEvent';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var string The status to be set for the user decided by a moderator, overriding whatever value the user had previously. Use reset to default to original state. */
    public string $status;
    public ?string $access;

    /** @var string Comment describing the reason for the override. */
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
        return ['comment', 'status'];
    }

    public static function new(string $status, string $comment, ?string $access = null): self
    {
        $instance = new self();
        $instance->status = $status;
        $instance->comment = $comment;
        if ($access !== null) {
            $instance->access = $access;
        }

        return $instance;
    }
}
