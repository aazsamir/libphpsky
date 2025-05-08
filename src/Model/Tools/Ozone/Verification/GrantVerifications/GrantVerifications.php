<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications;

/**
 * Grant verifications to multiple subjects. Allows batch processing of up to 100 verifications at once.
 * procedure
 */
class GrantVerifications implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.verification.grantVerifications';

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
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
