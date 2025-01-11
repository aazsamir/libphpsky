<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Actor\ExportAccountData;

/**
 * query
 */
class ExportAccountData implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.actor.exportAccountData';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
