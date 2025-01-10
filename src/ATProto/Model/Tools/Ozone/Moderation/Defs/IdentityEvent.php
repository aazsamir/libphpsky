<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class IdentityEvent implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'identityEvent';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public ?string $handle = null;
    public ?string $pdsHost = null;
    public ?bool $tombstone = null;
    public string $timestamp;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $timestamp,
        ?string $comment = null,
        ?string $handle = null,
        ?string $pdsHost = null,
        ?bool $tombstone = null,
    ): self {
        $instance = new self();
        $instance->timestamp = $timestamp;
        $instance->comment = $comment;
        $instance->handle = $handle;
        $instance->pdsHost = $pdsHost;
        $instance->tombstone = $tombstone;

        return $instance;
    }
}
