<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\QueryLabels;

/**
 * Find labels relevant to the provided AT-URI patterns. Public endpoint for moderation services, though may return different or additional results with auth.
 * query
 */
class QueryLabels implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.label.queryLabels';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $uriPatterns
     * @param ?array<string> $sources
     */
    public function query(
        array $uriPatterns,
        ?array $sources = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\QueryLabels\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
