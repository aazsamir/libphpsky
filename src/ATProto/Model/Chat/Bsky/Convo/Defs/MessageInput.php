<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class MessageInput implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'messageInput';
    public const ID = 'chat.bsky.convo.defs';

    public string $text;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $facets = [];

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\Record|null */
    public mixed $embed = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet> $facets
     */
    public static function new(
        string $text,
        ?array $facets = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\Record $embed = null,
    ): self {
        $instance = new self();
        $instance->text = $text;
        $instance->facets = $facets;
        $instance->embed = $embed;

        return $instance;
    }
}
