<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getTaggedSuggestions';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions\Suggestion> */
    public array $suggestions = [];

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
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions\Suggestion> $suggestions
     */
    public static function new(array $suggestions): self
    {
        $instance = new self();
        $instance->suggestions = $suggestions;

        return $instance;
    }
}
