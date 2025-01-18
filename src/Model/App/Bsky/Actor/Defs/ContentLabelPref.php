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

    public ?string $labelerDid = null;
    public string $label;
    public string $visibility;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $label, string $visibility, ?string $labelerDid = null): self
    {
        $instance = new self();
        $instance->label = $label;
        $instance->visibility = $visibility;
        $instance->labelerDid = $labelerDid;

        return $instance;
    }
}
