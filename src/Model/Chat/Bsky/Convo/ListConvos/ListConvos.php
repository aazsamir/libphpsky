<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos;

/**
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

    public function query(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $readState = null,
        ?string $status = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $readState = null,
        ?string $status = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
