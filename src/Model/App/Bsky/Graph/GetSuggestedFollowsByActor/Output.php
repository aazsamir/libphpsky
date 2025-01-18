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
    public ?bool $isFallback;
    public ?int $recId;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> $suggestions
     */
    public static function new(array $suggestions, ?bool $isFallback = null, ?int $recId = null): self
    {
        $instance = new self();
        $instance->suggestions = $suggestions;
        $instance->isFallback = $isFallback;
        $instance->recId = $recId;

        return $instance;
    }
}
