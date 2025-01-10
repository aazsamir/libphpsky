<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\DeleteTemplate;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.communication.deleteTemplate';

    public string $id;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $id): self
    {
        $instance = new self();
        $instance->id = $id;

        return $instance;
    }
}
