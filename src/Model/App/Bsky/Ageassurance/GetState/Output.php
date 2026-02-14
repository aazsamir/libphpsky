<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\GetState;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.ageassurance.getState';

    public \Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\State $state;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\StateMetadata $metadata;

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
        return ['state', 'metadata'];
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\State $state,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\StateMetadata $metadata = null,
    ): self {
        $instance = new self();
        $instance->state = $state;
        if ($metadata !== null) {
            $instance->metadata = $metadata;
        }

        return $instance;
    }
}
