<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * Preferences for how verified accounts appear in the app.
 * object
 */
class VerificationPrefs implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'verificationPrefs';
    public const ID = 'app.bsky.actor.defs';

    /** @var ?bool Hide the blue check badges for verified accounts and trusted verifiers. */
    public ?bool $hideBadges;

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

    public static function new(?bool $hideBadges = null): self
    {
        $instance = new self();
        if ($hideBadges !== null) {
            $instance->hideBadges = $hideBadges;
        }

        return $instance;
    }
}
