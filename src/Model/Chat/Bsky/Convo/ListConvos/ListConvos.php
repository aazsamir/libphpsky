<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos;

/**
 * Returns a page of conversations (direct or group) for the user.
 * query
 */
class ListConvos implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.listConvos';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $status Filter convos by their status. It is discouraged to call with "request" and preferred to call chat.bsky.convo.listConvoRequests, which also includes group join requests made by the user.
     * @param ?string $kind Filter by conversation kind.
     * @param ?string $lockStatus Filter by conversation lock status. Values follow chat.bsky.convo.defs#convoLockStatus.
     */
    public function query(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $readState = null,
        ?string $status = null,
        ?string $kind = null,
        ?string $lockStatus = null,
    ): ListConvosOutput {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos\ListConvosOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $status Filter convos by their status. It is discouraged to call with "request" and preferred to call chat.bsky.convo.listConvoRequests, which also includes group join requests made by the user.
     * @param ?string $kind Filter by conversation kind.
     * @param ?string $lockStatus Filter by conversation lock status. Values follow chat.bsky.convo.defs#convoLockStatus.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $readState = null,
        ?string $status = null,
        ?string $kind = null,
        ?string $lockStatus = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
