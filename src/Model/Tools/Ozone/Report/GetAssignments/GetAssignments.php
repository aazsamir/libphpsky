<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\GetAssignments;

/**
 * Get assignments for reports.
 * query
 */
class GetAssignments implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.getAssignments';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?bool $onlyActive When true, only returns active assignments.
     * @param ?array<int> $reportIds  If specified, returns assignments for these reports only.
     * @param ?array<string> $dids  If specified, returns assignments for these moderators only.
     */
    public function query(
        ?bool $onlyActive = null,
        ?array $reportIds = null,
        ?array $dids = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\GetAssignments\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?bool $onlyActive When true, only returns active assignments.
     * @param ?array<int> $reportIds  If specified, returns assignments for these reports only.
     * @param ?array<string> $dids  If specified, returns assignments for these moderators only.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?bool $onlyActive = null,
        ?array $reportIds = null,
        ?array $dids = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
