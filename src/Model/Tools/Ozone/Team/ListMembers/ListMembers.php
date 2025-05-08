<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListMembers;

/**
 * List all members with access to the ozone service.
 * query
 */
class ListMembers implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.team.listMembers';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?array<string> $roles
     */
    public function query(
        ?string $q = null,
        ?bool $disabled = null,
        ?array $roles = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListMembers\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param ?array<string> $roles
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?string $q = null,
        ?bool $disabled = null,
        ?array $roles = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
