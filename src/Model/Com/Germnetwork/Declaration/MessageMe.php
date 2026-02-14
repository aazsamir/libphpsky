<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Germnetwork\Declaration;

/**
 * object
 */
class MessageMe implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'messageMe';
    public const ID = 'com.germnetwork.declaration';

    /** @var string A URL to present to an account that does not have its own com.germnetwork.declaration record, must have an empty fragment component, where the app should fill in the fragment component with the DIDs of the two accounts who wish to message each other */
    public string $messageMeUrl;

    /** @var string The policy of who can message the account, this value is included in the keyPackage, but is duplicated here to allow applications to decide if they should show a 'Message on Germ' button to the viewer. */
    public string $showButtonTo;

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
        return ['showButtonTo', 'messageMeUrl'];
    }

    public static function new(string $messageMeUrl, string $showButtonTo): self
    {
        $instance = new self();
        $instance->messageMeUrl = $messageMeUrl;
        $instance->showButtonTo = $showButtonTo;

        return $instance;
    }
}
