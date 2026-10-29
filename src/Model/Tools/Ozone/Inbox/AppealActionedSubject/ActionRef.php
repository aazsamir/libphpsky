<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\AppealActionedSubject;

/**
 * object
 */
class ActionRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'actionRef';
    public const ID = 'tools.ozone.inbox.appealActionedSubject';

    /** @var int ID of the moderation action being appealed, available via actions in mod inbox. */
    public int $id;

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
        return ['id'];
    }

    public static function new(int $id): self
    {
        $instance = new self();
        $instance->id = $id;

        return $instance;
    }
}
