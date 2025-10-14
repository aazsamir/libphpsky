<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\QueryLabels;

/**
 * Find labels relevant to the provided AT-URI patterns. Public endpoint for moderation services, though may return different or additional results with auth.
 * query
 */
class QueryLabels implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.label.queryLabels';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $uriPatterns  List of AT URI patterns to match (boolean 'OR'). Each may be a prefix (ending with '*'; will match inclusive of the string leading to '*'), or a full URI.
     * @param ?array<string> $sources  Optional list of label sources (DIDs) to filter on.
     */
    public function query(
        array $uriPatterns,
        ?array $sources = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Label\QueryLabels\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param array<string> $uriPatterns  List of AT URI patterns to match (boolean 'OR'). Each may be a prefix (ending with '*'; will match inclusive of the string leading to '*'), or a full URI.
     * @param ?array<string> $sources  Optional list of label sources (DIDs) to filter on.
     * @return array<string, mixed>
     */
    public function rawQuery(
        array $uriPatterns,
        ?array $sources = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
