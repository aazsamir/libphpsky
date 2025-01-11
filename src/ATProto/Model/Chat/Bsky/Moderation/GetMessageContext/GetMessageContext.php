<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Moderation\GetMessageContext;

/**
 * query
 */
class GetMessageContext implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.moderation.getMessageContext';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?string $convoId = null, string $messageId, ?int $before = null, ?int $after = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Moderation\GetMessageContext\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
