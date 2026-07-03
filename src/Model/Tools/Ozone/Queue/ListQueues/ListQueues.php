<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\ListQueues;

/**
 * List all configured moderation queues with statistics.
 * query
 */
class ListQueues implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.queue.listQueues';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?bool $enabled Filter by enabled status. If not specified, returns all queues.
     * @param ?string $subjectType Filter queues that handle this subject type ('account' or 'record').
     * @param ?string $collection Filter queues by collection name (e.g. 'app.bsky.feed.post').
     * @param ?array<string> $reportTypes  Filter queues that handle any of these report reason types.
     */
    public function query(
        ?bool $enabled = null,
        ?string $subjectType = null,
        ?string $collection = null,
        ?array $reportTypes = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): ListQueuesOutput {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\ListQueues\ListQueuesOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?bool $enabled Filter by enabled status. If not specified, returns all queues.
     * @param ?string $subjectType Filter queues that handle this subject type ('account' or 'record').
     * @param ?string $collection Filter queues by collection name (e.g. 'app.bsky.feed.post').
     * @param ?array<string> $reportTypes  Filter queues that handle any of these report reason types.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?bool $enabled = null,
        ?string $subjectType = null,
        ?string $collection = null,
        ?array $reportTypes = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
