<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetConvo;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Gets an existing conversation by its ID, for moderation purposes. Does not require the requester to be a member of the conversation.
 * query
 */
class GetConvo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.moderation.getConvo';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $convoId): GetConvoOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetConvo\GetConvoOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(string $convoId): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
