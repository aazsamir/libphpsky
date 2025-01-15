<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileAssociated implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'profileAssociated';
    public const ID = 'app.bsky.actor.defs';

    public ?int $lists = null;
    public ?int $feedgens = null;
    public ?int $starterPacks = null;
    public ?bool $labeler = null;
    public ?ProfileAssociatedChat $chat = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?int $lists = null,
        ?int $feedgens = null,
        ?int $starterPacks = null,
        ?bool $labeler = null,
        ?ProfileAssociatedChat $chat = null,
    ): self {
        $instance = new self();
        $instance->lists = $lists;
        $instance->feedgens = $feedgens;
        $instance->starterPacks = $starterPacks;
        $instance->labeler = $labeler;
        $instance->chat = $chat;

        return $instance;
    }
}
