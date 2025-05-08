<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\RevokeVerifications;

/**
 * Revoke previously granted verifications in batches of up to 100.
 * procedure
 */
class RevokeVerifications implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.verification.revokeVerifications';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\RevokeVerifications\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
