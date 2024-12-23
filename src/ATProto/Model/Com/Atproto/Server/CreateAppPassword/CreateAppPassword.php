<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateAppPassword;

/**
 * Create an App Password.
 * procedure
 */
class CreateAppPassword implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.createAppPassword';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): AppPassword
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateAppPassword\AppPassword::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
