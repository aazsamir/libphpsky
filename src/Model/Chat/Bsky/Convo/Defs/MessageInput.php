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

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> Annotations of text (mentions, URLs, hashtags, etc) */
    public ?array $facets = [];

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record|\Aazsamir\Libphpsky\Model\Chat\Bsky\Embed\JoinLink\JoinLink|null */
    public mixed $embed;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ReplyRef If set, the message this message is replying to. The referenced message must be in the same convo. */
    public ?ReplyRef $replyTo;

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
        return ['text'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $facets
     */
    public static function new(
        string $text,
        ?array $facets = [],
        \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record|\Aazsamir\Libphpsky\Model\Chat\Bsky\Embed\JoinLink\JoinLink|null $embed = null,
        ?ReplyRef $replyTo = null,
    ): self {
        $instance = new self();
        $instance->text = $text;
        if ($facets !== null) {
            $instance->facets = $facets;
        }
        if ($embed !== null) {
            $instance->embed = $embed;
        }
        if ($replyTo !== null) {
            $instance->replyTo = $replyTo;
        }

        return $instance;
    }
}
