<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\AppealActionedSubject;

/**
 * object
 */
class LabelRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labelRef';
    public const ID = 'tools.ozone.inbox.appealActionedSubject';

    /** @var string Label being appealed. */
    public string $val;

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
        return ['val'];
    }

    public static function new(string $val): self
    {
        $instance = new self();
        $instance->val = $val;

        return $instance;
    }
}
