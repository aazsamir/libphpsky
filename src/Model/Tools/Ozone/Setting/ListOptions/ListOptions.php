<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\ListOptions;

/**
 * List settings with optional filtering
 * query
 */
class ListOptions implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.setting.listOptions';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $prefix Filter keys by prefix
     * @param ?array<string> $keys  Filter for only the specified keys. Ignored if prefix is provided
     */
    public function query(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $scope = null,
        ?string $prefix = null,
        ?array $keys = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\ListOptions\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param ?string $prefix Filter keys by prefix
     * @param ?array<string> $keys  Filter for only the specified keys. Ignored if prefix is provided
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $scope = null,
        ?string $prefix = null,
        ?array $keys = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
