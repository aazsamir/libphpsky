<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Bookmark\CreateBookmark;

/**
 * Creates a private bookmark for the specified record. Currently, only `app.bsky.feed.post` records are supported. Requires authentication.
 * procedure
 */
class CreateBookmark implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.bookmark.createBookmark';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
