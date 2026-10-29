<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\SyncSource;

/**
 * Replace stored rules for one source from a complete snapshot. Existing rules owned by another source remain unchanged.
 * procedure
 */
class SyncSource implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.safelink.syncSource';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(SyncSourceInput $input): SyncSourceOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\SyncSource\SyncSourceOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(SyncSourceInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
