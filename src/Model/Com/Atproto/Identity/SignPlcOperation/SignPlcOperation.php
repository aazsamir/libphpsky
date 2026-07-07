<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation;

/**
 * Signs a PLC operation to update some value(s) in the requesting DID's document.
 * procedure
 */
class SignPlcOperation implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.signPlcOperation';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(SignPlcOperationInput $input): SignPlcOperationOutput
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation\SignPlcOperationOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(SignPlcOperationInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
