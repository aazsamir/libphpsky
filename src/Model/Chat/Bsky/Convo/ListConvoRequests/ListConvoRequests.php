<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvoRequests;

/**
 * Returns a page of incoming conversation requests for the user. Direct convo requests are returned as convoView; group join requests made by the user are returned as joinRequestConvoView.
 * query
 */
class ListConvoRequests implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.listConvoRequests';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(?int $limit = null, ?string $cursor = null): ListConvoRequestsOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvoRequests\ListConvoRequestsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
