<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindCorrelation;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.signature.findCorrelation';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\Defs\SigDetail> */
    public array $details = [];

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
        return ['details'];
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
