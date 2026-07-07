<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * Apply a batch transaction of repository creates, updates, and deletes. Requires auth, implemented by PDS.
 * procedure
 */
class ApplyWrites implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.applyWrites';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(ApplyWritesInput $input): ApplyWritesOutput
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\ApplyWritesOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(ApplyWritesInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
