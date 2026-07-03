<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\GetAssignments;

/**
 * Get moderator assignments, optionally filtered by active status, queue, or moderator.
 * query
 */
class GetAssignments implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.queue.getAssignments';

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
     * @param ?array<int> $queueIds  If specified, returns assignments for these queues only.
     * @param ?array<string> $dids  If specified, returns assignments for these moderators only.
     */
    public function query(
        ?bool $onlyActive = null,
        ?array $queueIds = null,
        ?array $dids = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): GetAssignmentsOutput {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\GetAssignments\GetAssignmentsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?bool $onlyActive When true, only returns active assignments.
     * @param ?array<int> $queueIds  If specified, returns assignments for these queues only.
     * @param ?array<string> $dids  If specified, returns assignments for these moderators only.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?bool $onlyActive = null,
        ?array $queueIds = null,
        ?array $dids = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
