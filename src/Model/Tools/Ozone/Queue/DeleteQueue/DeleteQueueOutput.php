<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\DeleteQueue;

/**
 * object
 */
class DeleteQueueOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.queue.deleteQueue';

    public bool $deleted;

    /** @var ?int Number of reports that were migrated (if migration occurred) */
    public ?int $reportsMigrated;

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
        return ['deleted'];
    }

    public static function new(bool $deleted, ?int $reportsMigrated = null): self
    {
        $instance = new self();
        $instance->deleted = $deleted;
        if ($reportsMigrated !== null) {
            $instance->reportsMigrated = $reportsMigrated;
        }

        return $instance;
    }
}
