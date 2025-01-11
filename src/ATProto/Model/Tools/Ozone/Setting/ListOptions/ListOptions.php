<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\ListOptions;

/**
 * List settings with optional filtering
 * query
 */
class ListOptions implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.setting.listOptions';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param ?array<string> $keys
     */
    public function query(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $scope = null,
        ?string $prefix = null,
        ?array $keys = null,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\ListOptions\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
