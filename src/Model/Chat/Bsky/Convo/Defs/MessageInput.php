<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class MessageInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'messageInput';
    public const ID = 'chat.bsky.convo.defs';

    public string $text;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $facets = [];

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record|null */
    public mixed $embed;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $facets
     */
    public static function new(
        string $text,
        ?array $facets = [],
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record $embed = null,
    ): self {
        $instance = new self();
        $instance->text = $text;
        $instance->facets = $facets;
        $instance->embed = $embed;

        return $instance;
    }
}
