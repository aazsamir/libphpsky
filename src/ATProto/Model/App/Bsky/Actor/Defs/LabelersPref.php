<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class LabelersPref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'labelersPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\LabelerPrefItem> */
    public array $labelers = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\LabelerPrefItem> $labelers
     */
    public static function new(array $labelers): self
    {
        $instance = new self();
        $instance->labelers = $labelers;

        return $instance;
    }
}
