<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\SyncSource;

/**
 * object
 */
class SourceRule implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'sourceRule';
    public const ID = 'tools.ozone.safelink.syncSource';

    public string $url;
    public ?string $pattern;
    public ?string $action;
    public ?string $reason;

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
        return ['url', 'pattern', 'action', 'reason'];
    }

    public static function new(
        string $url,
        ?string $pattern = null,
        ?string $action = null,
        ?string $reason = null,
    ): self {
        $instance = new self();
        $instance->url = $url;
        if ($pattern !== null) {
            $instance->pattern = $pattern;
        }
        if ($action !== null) {
            $instance->action = $action;
        }
        if ($reason !== null) {
            $instance->reason = $reason;
        }

        return $instance;
    }
}
