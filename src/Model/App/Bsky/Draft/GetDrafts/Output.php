<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\GetDrafts;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.draft.getDrafts';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftView> */
    public array $drafts = [];

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
        return ['drafts'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftView> $drafts
     */
    public static function new(array $drafts, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->drafts = $drafts;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
