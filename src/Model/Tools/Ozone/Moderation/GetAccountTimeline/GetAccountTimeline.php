<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetAccountTimeline;

/**
 * Get timeline of all available events of an account. This includes moderation events, account history and did history.
 * query
 */
class GetAccountTimeline implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.getAccountTimeline';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $did): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetAccountTimeline\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(string $did): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
