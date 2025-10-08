<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\Defs;

/**
 * Input for creating a URL safety rule
 * object
 */
class UrlRule implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'urlRule';
    public const ID = 'tools.ozone.safelink.defs';

    /** @var string The URL or domain to apply the rule to */
    public string $url;
    public ?string $pattern;
    public ?string $action;
    public ?string $reason;

    /** @var ?string Optional comment about the decision */
    public ?string $comment;

    /** @var string DID of the user added the rule. */
    public string $createdBy;

    /** @var \DateTimeInterface Timestamp when the rule was created */
    public \DateTimeInterface $createdAt;

    /** @var \DateTimeInterface Timestamp when the rule was last updated */
    public \DateTimeInterface $updatedAt;

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
        return ['url', 'pattern', 'action', 'reason', 'createdBy', 'createdAt', 'updatedAt'];
    }

    public static function new(
        string $url,
        string $createdBy,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        ?string $pattern = null,
        ?string $action = null,
        ?string $reason = null,
        ?string $comment = null,
    ): self {
        $instance = new self();
        $instance->url = $url;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
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

        return $instance;
    }
}
