<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\DescribeFeedGenerator;

/**
 * object
 */
class Links implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'links';
    public const ID = 'app.bsky.feed.describeFeedGenerator';

    public ?string $privacyPolicy;
    public ?string $termsOfService;

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

    public static function new(?string $privacyPolicy = null, ?string $termsOfService = null): self
    {
        $instance = new self();
        if ($privacyPolicy !== null) {
            $instance->privacyPolicy = $privacyPolicy;
        }
        if ($termsOfService !== null) {
            $instance->termsOfService = $termsOfService;
        }

        return $instance;
    }
}
