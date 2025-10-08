<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\Declaration;

/**
 * object
 */
class Declaration implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.notification.declaration';

    /** @var string A declaration of the user's preference for allowing activity subscriptions from other users. Absence of a record implies 'followers'. */
    public string $allowSubscriptions;

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
        return ['allowSubscriptions'];
    }

    public static function new(string $allowSubscriptions): self
    {
        $instance = new self();
        $instance->allowSubscriptions = $allowSubscriptions;

        return $instance;
    }
}
