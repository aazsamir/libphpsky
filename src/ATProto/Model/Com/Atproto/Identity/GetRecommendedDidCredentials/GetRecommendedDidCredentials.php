<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\GetRecommendedDidCredentials;

/**
 * Describe the credentials that should be included in the DID doc of an account that is migrating to this service.
 * query
 */
class GetRecommendedDidCredentials implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.getRecommendedDidCredentials';

    public static function id(): string
    {
        return self::ID;
    }

    function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\GetRecommendedDidCredentials\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
