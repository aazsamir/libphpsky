<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\UpdateQueue;

/**
 * object
 */
class UpdateQueueInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.queue.updateQueue';

    /** @var int ID of the queue to update */
    public int $queueId;

    /** @var ?string New display name for the queue */
    public ?string $name;

    /** @var ?bool Enable or disable the queue */
    public ?bool $enabled;

    /** @var ?string Optional description of the queue */
    public ?string $description;

    /** @var ?array<string> Policy keys to recommend when actioning reports in this queue */
    public ?array $recommendedPolicies = [];

    /** @var ?array<string> Labels to recommend for this queue and use as fallback appeal routing mappings */
    public ?array $recommendedLabels = [];

    /** @var ?bool Admins can always list this queue and browse its reports. Other roles require an active queue assignment. Individual report and moderation event access is unchanged. */
    public ?bool $strictAccess;

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
        return ['queueId'];
    }

    /**
     * @param array<string> $recommendedPolicies
     * @param array<string> $recommendedLabels
     */
    public static function new(
        int $queueId,
        ?string $name = null,
        ?bool $enabled = null,
        ?string $description = null,
        ?array $recommendedPolicies = [],
        ?array $recommendedLabels = [],
        ?bool $strictAccess = null,
    ): self {
        $instance = new self();
        $instance->queueId = $queueId;
        if ($name !== null) {
            $instance->name = $name;
        }
        if ($enabled !== null) {
            $instance->enabled = $enabled;
        }
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($recommendedPolicies !== null) {
            $instance->recommendedPolicies = $recommendedPolicies;
        }
        if ($recommendedLabels !== null) {
            $instance->recommendedLabels = $recommendedLabels;
        }
        if ($strictAccess !== null) {
            $instance->strictAccess = $strictAccess;
        }

        return $instance;
    }
}
