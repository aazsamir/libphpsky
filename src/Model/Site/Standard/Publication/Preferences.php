<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Site\Standard\Publication;

/**
 * object
 */
class Preferences implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'preferences';
    public const ID = 'site.standard.publication';

    /** @var ?bool Boolean which decides whether the publication should appear in discovery feeds. */
    public ?bool $showInDiscover;

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

    public static function new(?bool $showInDiscover = null): self
    {
        $instance = new self();
        if ($showInDiscover !== null) {
            $instance->showInDiscover = $showInDiscover;
        }

        return $instance;
    }
}
