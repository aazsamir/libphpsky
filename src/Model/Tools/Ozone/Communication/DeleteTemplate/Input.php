<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\DeleteTemplate;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

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
