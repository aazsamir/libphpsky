<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetHostStatus;

/**
 * Returns information about a specified upstream host, as consumed by the server. Implemented by relays.
 * query
 */
class GetHostStatus implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getHostStatus';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $hostname Hostname of the host (eg, PDS or relay) being queried.
     */
    public function query(string $hostname): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetHostStatus\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $hostname Hostname of the host (eg, PDS or relay) being queried.
     * @return array<string, mixed>
     */
    public function rawQuery(string $hostname): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
