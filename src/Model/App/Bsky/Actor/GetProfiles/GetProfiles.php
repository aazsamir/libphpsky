<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfiles;

/**
 * Get detailed profile views of multiple actors.
 * query
 */
class GetProfiles implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.getProfiles';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $actors
     */
    public function query(array $actors): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfiles\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
