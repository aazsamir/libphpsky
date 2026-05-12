<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\CreateQueue;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.queue.createQueue';

    /** @var string Display name for the queue (must be unique) */
    public string $name;

    /** @var array<string> Subject types this queue accepts */
    public array $subjectTypes = [];

    /** @var ?string Collection name for record subjects. Required if subjectTypes includes 'record'. */
    public ?string $collection;

    /** @var array<string> Report reason types (fully qualified NSIDs) */
    public array $reportTypes = [];

    /** @var ?string Optional description of the queue */
    public ?string $description;

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
        return ['name', 'subjectTypes', 'reportTypes'];
    }

    /**
     * @param array<string> $subjectTypes
     * @param array<string> $reportTypes
     */
    public static function new(
        string $name,
        array $subjectTypes,
        array $reportTypes,
        ?string $collection = null,
        ?string $description = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->subjectTypes = $subjectTypes;
        $instance->reportTypes = $reportTypes;
        if ($collection !== null) {
            $instance->collection = $collection;
        }
        if ($description !== null) {
            $instance->description = $description;
        }

        return $instance;
    }
}
