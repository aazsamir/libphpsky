<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetSuggestedFollowsByActor;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getSuggestedFollowsByActor';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> */
    public array $suggestions = [];

    /** @var ?bool If true, response has fallen-back to generic results, and is not scoped using relativeToDid */
    public ?bool $isFallback;

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
        return ['suggestions'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> $suggestions
     */
    public static function new(array $suggestions, ?bool $isFallback = null, ?int $recId = null): self
    {
        $instance = new self();
        $instance->suggestions = $suggestions;
        if ($isFallback !== null) {
            $instance->isFallback = $isFallback;
        }
        if ($recId !== null) {
            $instance->recId = $recId;
        }

        return $instance;
    }
}
