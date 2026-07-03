<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetConvos;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Gets existing conversations by their IDs, for moderation purposes. Does not require the requester to be a member of the conversations. Unknown IDs are silently omitted from the response.
 * query
 */
class GetConvos implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.moderation.getConvos';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $convoIds
     */
    public function query(array $convoIds): GetConvosOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetConvos\GetConvosOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param array<string> $convoIds
     * @return array<string, mixed>
     */
    public function rawQuery(array $convoIds): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
