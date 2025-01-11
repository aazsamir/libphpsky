<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetTaggedSuggestions;

/**
 * Get a list of suggestions (feeds and users) tagged with categories
 * query
 */
class GetTaggedSuggestions implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getTaggedSuggestions';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetTaggedSuggestions\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
