<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetUnreadCount;

/**
 * query
 */
class GetUnreadCount implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.getUnreadCount';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $did Account to preview. Only Ozone staff can read another account; this does not change its read state.
     */
    public function query(?string $section = null, ?string $did = null): GetUnreadCountOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetUnreadCount\GetUnreadCountOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $did Account to preview. Only Ozone staff can read another account; this does not change its read state.
     * @return array<string, mixed>
     */
    public function rawQuery(?string $section = null, ?string $did = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
