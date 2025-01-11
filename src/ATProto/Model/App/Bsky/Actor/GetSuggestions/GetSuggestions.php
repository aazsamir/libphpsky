<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetSuggestions;

/**
 * Get a list of suggested actors. Expected use is discovery of accounts to follow during new account onboarding.
 * query
 */
class GetSuggestions implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.getSuggestions';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetSuggestions\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
