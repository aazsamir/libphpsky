<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindCorrelation;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.signature.findCorrelation';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\Defs\SigDetail> */
    public array $details = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\Defs\SigDetail> $details
     */
    public static function new(array $details): self
    {
        $instance = new self();
        $instance->details = $details;

        return $instance;
    }
}
