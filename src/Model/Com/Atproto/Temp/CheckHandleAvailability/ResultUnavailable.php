<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckHandleAvailability;

/**
 * Indicates the provided handle is unavailable and gives suggestions of available handles.
 * object
 */
class ResultUnavailable implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'resultUnavailable';
    public const ID = 'com.atproto.temp.checkHandleAvailability';

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckHandleAvailability\Suggestion> List of suggested handles based on the provided inputs. */
    public array $suggestions = [];

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
        return ['suggestions'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckHandleAvailability\Suggestion> $suggestions
     */
    public static function new(array $suggestions): self
    {
        $instance = new self();
        $instance->suggestions = $suggestions;

        return $instance;
    }
}
