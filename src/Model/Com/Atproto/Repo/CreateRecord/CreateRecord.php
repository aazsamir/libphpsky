<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord;

/**
 * Create a single new repository record. Requires auth, implemented by PDS.
 * procedure
 */
class CreateRecord implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.createRecord';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(CreateRecordInput $input): CreateRecordOutput
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord\CreateRecordOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(CreateRecordInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
