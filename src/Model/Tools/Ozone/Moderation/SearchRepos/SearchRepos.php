<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\SearchRepos;

/**
 * Find repositories based on a search term.
 * query
 */
class SearchRepos implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.searchRepos';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?string $term = null, ?string $q = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\SearchRepos\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
