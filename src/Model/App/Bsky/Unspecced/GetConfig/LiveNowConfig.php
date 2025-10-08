<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetConfig;

/**
 * object
 */
class LiveNowConfig implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'liveNowConfig';
    public const ID = 'app.bsky.unspecced.getConfig';

    public string $did;

    /** @var array<string> */
    public array $domains = [];

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
        return ['did', 'domains'];
    }

    /**
     * @param array<string> $domains
     */
    public static function new(string $did, array $domains): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->domains = $domains;

        return $instance;
    }
}
