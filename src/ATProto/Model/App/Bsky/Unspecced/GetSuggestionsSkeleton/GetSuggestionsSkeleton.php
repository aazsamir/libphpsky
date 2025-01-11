<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton;

/**
 * Get a skeleton of suggested actors. Intended to be called and then hydrated through app.bsky.actor.getSuggestions
 * query
 */
class GetSuggestionsSkeleton implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getSuggestionsSkeleton';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $relativeToDid = null,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
