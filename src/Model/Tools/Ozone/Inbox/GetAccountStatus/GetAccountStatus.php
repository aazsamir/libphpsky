<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetAccountStatus;

/**
 * Get the authenticated account's current standing with this moderation service.
 * query
 */
class GetAccountStatus implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.getAccountStatus';

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
    public function query(?string $did = null): GetAccountStatusOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetAccountStatus\GetAccountStatusOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $did Account to preview. Only Ozone staff can read another account; this does not change its read state.
     * @return array<string, mixed>
     */
    public function rawQuery(?string $did = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
