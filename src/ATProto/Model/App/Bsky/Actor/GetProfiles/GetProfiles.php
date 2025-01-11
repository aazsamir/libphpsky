<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetProfiles;

/**
 * Get detailed profile views of multiple actors.
 * query
 */
class GetProfiles implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.getProfiles';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $actors
     */
    function query(array $actors): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetProfiles\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
