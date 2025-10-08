<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\Defs;

/**
 * An event for URL safety decisions
 * object
 */
class Event implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'event';
    public const ID = 'tools.ozone.safelink.defs';

    /** @var int Auto-incrementing row ID */
    public int $id;
    public string $eventType;

    /** @var string The URL that this rule applies to */
    public string $url;
    public ?string $pattern;
    public ?string $action;
    public ?string $reason;

    /** @var string DID of the user who created this rule */
    public string $createdBy;
    public \DateTimeInterface $createdAt;

    /** @var ?string Optional comment about the decision */
    public ?string $comment;

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
        return ['id', 'eventType', 'url', 'pattern', 'action', 'reason', 'createdBy', 'createdAt'];
    }

    public static function new(
        int $id,
        string $eventType,
        string $url,
        string $createdBy,
        \DateTimeInterface $createdAt,
        ?string $pattern = null,
        ?string $action = null,
        ?string $reason = null,
        ?string $comment = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->eventType = $eventType;
        $instance->url = $url;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;
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
