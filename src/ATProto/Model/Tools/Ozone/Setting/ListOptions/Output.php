<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\ListOptions;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.setting.listOptions';

    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\Defs\Option[] */
    public array $options = [];

    public static function id(): string
    {
        return self::ID;
    }
}
