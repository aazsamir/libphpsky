<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\CreateDraft;

/**
 * Inserts a draft using private storage (stash). An upper limit of drafts might be enforced. Requires authentication.
 * procedure
 */
class CreateDraft implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.draft.createDraft';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Draft\CreateDraft\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
