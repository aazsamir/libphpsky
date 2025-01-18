<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs;

/**
 * object
 */
class LabelerPolicies implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labelerPolicies';
    public const ID = 'app.bsky.labeler.defs';

    /** @var array<string> */
    public array $labelValues = [];

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\LabelValueDefinition>|null */
    public ?array $labelValueDefinitions = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $labelValues
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\LabelValueDefinition> $labelValueDefinitions
     */
    public static function new(array $labelValues, ?array $labelValueDefinitions = []): self
    {
        $instance = new self();
        $instance->labelValues = $labelValues;
        $instance->labelValueDefinitions = $labelValueDefinitions;

        return $instance;
    }
}
