<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTaggedSuggestions;

/**
 * object
 */
class Suggestion implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'suggestion';
    public const ID = 'app.bsky.unspecced.getTaggedSuggestions';

    public string $tag;
    public string $subjectType;
    public string $subject;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $tag, string $subjectType, string $subject): self
    {
        $instance = new self();
        $instance->tag = $tag;
        $instance->subjectType = $subjectType;
        $instance->subject = $subject;

        return $instance;
    }
}
