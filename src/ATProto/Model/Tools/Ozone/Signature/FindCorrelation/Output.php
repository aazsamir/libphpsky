<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\FindCorrelation;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.signature.findCorrelation';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\Defs\SigDetail[] */
    public array $details = [];

    public static function id(): string
    {
        return self::ID;
    }
}
