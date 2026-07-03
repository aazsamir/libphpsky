<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnmuteConvo;

/**
 * Unmutes a conversation, allowing notifications related to it.
 * procedure
 */
class UnmuteConvo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.unmuteConvo';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(UnmuteConvoInput $input): UnmuteConvoOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnmuteConvo\UnmuteConvoOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
