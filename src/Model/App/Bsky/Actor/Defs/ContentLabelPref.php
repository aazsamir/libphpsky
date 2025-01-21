<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ContentLabelPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'contentLabelPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var ?string Which labeler does this preference apply to? If undefined, applies globally. */
    public ?string $labelerDid;
    public string $label;
    public string $visibility;

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
        return ['label', 'visibility'];
    }

    public static function new(string $label, string $visibility, ?string $labelerDid = null): self
    {
        $instance = new self();
        $instance->label = $label;
        $instance->visibility = $visibility;
        if ($labelerDid !== null) {
            $instance->labelerDid = $labelerDid;
        }

        return $instance;
    }
}
