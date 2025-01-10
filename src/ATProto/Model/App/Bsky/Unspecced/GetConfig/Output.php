<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetConfig;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getConfig';

    public ?bool $checkEmailConfirmed = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?bool $checkEmailConfirmed = null): self
    {
        $instance = new self();
        $instance->checkEmailConfirmed = $checkEmailConfirmed;

        return $instance;
    }
}
