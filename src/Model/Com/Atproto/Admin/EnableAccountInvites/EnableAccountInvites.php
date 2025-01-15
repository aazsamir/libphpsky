<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\EnableAccountInvites;

/**
 * Re-enable an account's ability to receive invite codes.
 * procedure
 */
class EnableAccountInvites implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.enableAccountInvites';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}