<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetSuggestions;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.actor.getSuggestions';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> */
    public array $actors = [];

    /** @var ?int Snowflake for this recommendation, use when submitting recommendation events. */
    public ?int $recId;

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
        return ['actors'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> $actors
     */
    public static function new(array $actors, ?string $cursor = null, ?int $recId = null): self
    {
        $instance = new self();
        $instance->actors = $actors;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($recId !== null) {
            $instance->recId = $recId;
        }

        return $instance;
    }
}
