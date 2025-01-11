<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\GetRepos;

/**
 * Get details about some repositories.
 * query
 */
class GetRepos implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.getRepos';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $dids
     */
    public function query(array $dids): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\GetRepos\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
