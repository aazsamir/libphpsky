<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetEvent;

/**
 * Get details about a moderation event.
 * query
 */
class GetEvent implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.getEvent';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(int $id): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventViewDetail
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventViewDetail::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(int $id): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
