<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\DescribeServer;

/**
 * object
 */
class Links implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'links';
    public const ID = 'com.atproto.server.describeServer';

    public ?string $privacyPolicy = null;
    public ?string $termsOfService = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $privacyPolicy = null, ?string $termsOfService = null): self
    {
        $instance = new self();
        $instance->privacyPolicy = $privacyPolicy;
        $instance->termsOfService = $termsOfService;

        return $instance;
    }
}
