<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs;

/**
 * object
 */
class QueueView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'queueView';
    public const ID = 'tools.ozone.queue.defs';

    /** @var int Queue ID */
    public int $id;

    /** @var string Display name of the queue */
    public string $name;

    /** @var array<string> Subject types this queue accepts. */
    public array $subjectTypes = [];

    /** @var ?string Collection name for record subjects (e.g., 'app.bsky.feed.post') */
    public ?string $collection;

    /** @var array<string> Report reason types this queue accepts (fully qualified NSIDs) */
    public array $reportTypes = [];

    /** @var ?string Optional description of the queue */
    public ?string $description;

    /** @var string DID of moderator who created this queue */
    public string $createdBy;
    public \DateTimeInterface $createdAt;
    public \DateTimeInterface $updatedAt;

    /** @var bool Whether this queue is currently active */
    public bool $enabled;

    /** @var ?\DateTimeInterface When the queue was deleted, if applicable */
    public ?\DateTimeInterface $deletedAt;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueStats Statistics about this queue */
    public ?QueueStats $stats;

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
        return ['id', 'name', 'subjectTypes', 'reportTypes', 'createdBy', 'createdAt', 'updatedAt', 'enabled', 'stats'];
    }

    /**
     * @param array<string> $subjectTypes
     * @param array<string> $reportTypes
     */
    public static function new(
        int $id,
        string $name,
        array $subjectTypes,
        array $reportTypes,
        string $createdBy,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        bool $enabled,
        ?string $collection = null,
        ?string $description = null,
        ?\DateTimeInterface $deletedAt = null,
        ?QueueStats $stats = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->name = $name;
        $instance->subjectTypes = $subjectTypes;
        $instance->reportTypes = $reportTypes;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        $instance->enabled = $enabled;
        if ($collection !== null) {
            $instance->collection = $collection;
        }
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($deletedAt !== null) {
            $instance->deletedAt = $deletedAt;
        }
        if ($stats !== null) {
            $instance->stats = $stats;
        }

        return $instance;
    }
}
