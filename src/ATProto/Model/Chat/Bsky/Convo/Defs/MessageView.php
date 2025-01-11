<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class MessageView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'messageView';
    public const ID = 'chat.bsky.convo.defs';

    public string $id;
    public string $rev;
    public string $text;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $facets = [];

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\View|null */
    public mixed $embed = null;
    public ?MessageViewSender $sender = null;
    public string $sentAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet> $facets
     */
    public static function new(
        string $id,
        string $rev,
        string $text,
        string $sentAt,
        ?array $facets = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\View $embed = null,
        ?MessageViewSender $sender = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->rev = $rev;
        $instance->text = $text;
        $instance->sentAt = $sentAt;
        $instance->facets = $facets;
        $instance->embed = $embed;
        $instance->sender = $sender;

        return $instance;
    }
}
