<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\AddRule;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.safelink.addRule';

    /** @var string The URL or domain to apply the rule to */
    public string $url;
    public ?string $pattern;
    public ?string $action;
    public ?string $reason;

    /** @var ?string Optional comment about the decision */
    public ?string $comment;

    /** @var ?string Author DID. Only respected when using admin auth */
    public ?string $createdBy;

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
        ?string $comment = null,
        ?string $createdBy = null,
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
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($createdBy !== null) {
            $instance->createdBy = $createdBy;
        }

        return $instance;
    }
}
