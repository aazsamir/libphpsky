<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory;

/**
 * Get account history, e.g. log of updated email addresses or other identity information.
 * query
 */
class GetAccountHistory implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.hosting.getAccountHistory';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?array<string> $events
     */
    public function query(string $did, ?array $events = null, ?string $cursor = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?array<string> $events
     * @return array<string, mixed>
     */
    public function rawQuery(string $did, ?array $events = null, ?string $cursor = null, ?int $limit = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
