<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetConfig;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getConfig';

    public ?bool $checkEmailConfirmed;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetConfig\LiveNowConfig> */
    public ?array $liveNow = [];

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
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetConfig\LiveNowConfig> $liveNow
     */
    public static function new(?bool $checkEmailConfirmed = null, ?array $liveNow = []): self
    {
        $instance = new self();
        if ($checkEmailConfirmed !== null) {
            $instance->checkEmailConfirmed = $checkEmailConfirmed;
        }
        if ($liveNow !== null) {
            $instance->liveNow = $liveNow;
        }

        return $instance;
    }
}
