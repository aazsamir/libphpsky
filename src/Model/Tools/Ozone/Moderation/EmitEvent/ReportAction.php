<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\EmitEvent;

/**
 * Target specific reports when emitting a moderation event
 * object
 */
class ReportAction implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reportAction';
    public const ID = 'tools.ozone.moderation.emitEvent';

    /** @var ?array<int> Target specific report IDs */
    public ?array $ids = [];

    /** @var ?array<string> Target reports matching these report types on the subject (fully qualified NSIDs) */
    public ?array $types = [];

    /** @var ?bool Target ALL reports on the subject */
    public ?bool $all;

    /** @var ?string Note to send to reporter(s) when actioning their report */
    public ?string $note;

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
        return [];
    }

    /**
     * @param array<int> $ids
     * @param array<string> $types
     */
    public static function new(?array $ids = [], ?array $types = [], ?bool $all = null, ?string $note = null): self
    {
        $instance = new self();
        if ($ids !== null) {
            $instance->ids = $ids;
        }
        if ($types !== null) {
            $instance->types = $types;
        }
        if ($all !== null) {
            $instance->all = $all;
        }
        if ($note !== null) {
            $instance->note = $note;
        }

        return $instance;
    }
}
