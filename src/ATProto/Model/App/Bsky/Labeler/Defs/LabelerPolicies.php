<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Labeler\Defs;

/**
 * object
 */
class LabelerPolicies implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'labelerPolicies';
    public const ID = 'app.bsky.labeler.defs';

    /** @var string[] */
    public array $labelValues = [];

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\LabelValueDefinition[] */
    public ?array $labelValueDefinitions = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $labelValues
     * @param \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\LabelValueDefinition[] $labelValueDefinitions
     */
    public static function new(array $labelValues, ?array $labelValueDefinitions = null): self
    {
        $instance = new self();
        $instance->labelValues = $labelValues;
        $instance->labelValueDefinitions = $labelValueDefinitions;

        return $instance;
    }
}
