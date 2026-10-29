<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\SyncSource;

/**
 * object
 */
class SyncSourceInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.safelink.syncSource';

    /** @var string Source whose rules are being synchronized */
    public string $source;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\SyncSource\SourceRule> */
    public array $rules = [];

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
        return ['source', 'rules'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\SyncSource\SourceRule> $rules
     */
    public static function new(string $source, array $rules): self
    {
        $instance = new self();
        $instance->source = $source;
        $instance->rules = $rules;

        return $instance;
    }
}
