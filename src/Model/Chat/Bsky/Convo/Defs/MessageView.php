<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class MessageView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'messageView';
    public const ID = 'chat.bsky.convo.defs';

    public string $id;
    public string $rev;
    public string $text;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> Annotations of text (mentions, URLs, hashtags, etc) */
    public ?array $facets = [];

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\View|null */
    public mixed $embed;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ReactionView> Reactions to this message, in ascending order of creation time. */
    public ?array $reactions = [];
    public ?MessageViewSender $sender;
    public \DateTimeInterface $sentAt;

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
        return ['id', 'rev', 'text', 'sender', 'sentAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $facets
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ReactionView> $reactions
     */
    public static function new(
        string $id,
        string $rev,
        string $text,
        \DateTimeInterface $sentAt,
        ?array $facets = [],
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\View $embed = null,
        ?array $reactions = [],
        ?MessageViewSender $sender = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->rev = $rev;
        $instance->text = $text;
        $instance->sentAt = $sentAt;
        if ($facets !== null) {
            $instance->facets = $facets;
        }
        if ($embed !== null) {
            $instance->embed = $embed;
        }
        if ($reactions !== null) {
            $instance->reactions = $reactions;
        }
        if ($sender !== null) {
            $instance->sender = $sender;
        }

        return $instance;
    }
}
