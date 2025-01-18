<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class LabelersPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labelersPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\LabelerPrefItem> */
    public array $labelers = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\LabelerPrefItem> $labelers
     */
    public static function new(array $labelers): self
    {
        $instance = new self();
        $instance->labelers = $labelers;

        return $instance;
    }
}
