<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountSigningKey;

/**
 * Administrative action to update an account's signing key in their Did document.
 * procedure
 */
class UpdateAccountSigningKey implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.updateAccountSigningKey';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(UpdateAccountSigningKeyInput $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }

    public function rawProcedure(UpdateAccountSigningKeyInput $input): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
