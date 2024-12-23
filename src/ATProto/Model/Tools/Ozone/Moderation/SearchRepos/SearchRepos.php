<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\SearchRepos;

/**
 * Find repositories based on a search term.
 * query
 */
class SearchRepos implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.searchRepos';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $term, string $q, int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\SearchRepos\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
