<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\RemoveOptions;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.setting.removeOptions';

    /** @var array<string> */
    public array $keys = [];
    public string $scope;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $keys
     */
    public static function new(array $keys, string $scope): self
    {
        $instance = new self();
        $instance->keys = $keys;
        $instance->scope = $scope;

        return $instance;
    }
}
