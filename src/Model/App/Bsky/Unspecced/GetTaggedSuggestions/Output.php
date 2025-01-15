<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getTaggedSuggestions';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions\Suggestion> */
    public array $suggestions = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions\Suggestion> $suggestions
     */
    public static function new(array $suggestions): self
    {
        $instance = new self();
        $instance->suggestions = $suggestions;

        return $instance;
    }
}
