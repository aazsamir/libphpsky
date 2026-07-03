<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch;

/**
 * Sends a batch of messages to a conversation.
 * procedure
 */
class SendMessageBatch implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.sendMessageBatch';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(SendMessageBatchInput $input): SendMessageBatchOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch\SendMessageBatchOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
