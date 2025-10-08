<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\QueryRules;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.safelink.queryRules';

    /** @var ?string Next cursor for pagination. Only present if there are more results. */
    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\Defs\UrlRule> */
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
        return ['rules'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\Defs\UrlRule> $rules
     */
    public static function new(array $rules, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->rules = $rules;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
