<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\ListNotifications;

/**
 * query
 */
class ListNotifications implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.listNotifications';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?array<string> $reasons
     * @param ?string $did Account to preview. Only Ozone staff can read another account; this does not change its read state.
     */
    public function query(
        ?string $section = null,
        ?array $reasons = null,
        ?bool $unreadOnly = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $did = null,
    ): ListNotificationsOutput {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\ListNotifications\ListNotificationsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?array<string> $reasons
     * @param ?string $did Account to preview. Only Ozone staff can read another account; this does not change its read state.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?string $section = null,
        ?array $reasons = null,
        ?bool $unreadOnly = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $did = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
