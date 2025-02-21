<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetReporterStats;

/**
 * Get reporter stats for a list of users.
 * query
 */
class GetReporterStats implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.getReporterStats';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $dids
     */
    public function query(array $dids): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetReporterStats\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
