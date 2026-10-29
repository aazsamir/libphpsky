<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetActionedSubject;

/**
 * Get a subject belonging to the authenticated account, including its moderation action history from this moderation service.
 * query
 */
class GetActionedSubject implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.getActionedSubject';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $subject DID or AT-URI of the subject to retrieve.
     * @param ?string $did Account to preview. Defaults to the authenticated account; another account requires an active moderator, triage, or admin credential.
     * @param ?int $limit Maximum number of actions to return.
     * @param ?string $cursor Opaque cursor for the next page of this subject's action history.
     */
    public function query(
        string $subject,
        ?string $did = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\SubjectViewDetail {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\SubjectViewDetail::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $subject DID or AT-URI of the subject to retrieve.
     * @param ?string $did Account to preview. Defaults to the authenticated account; another account requires an active moderator, triage, or admin credential.
     * @param ?int $limit Maximum number of actions to return.
     * @param ?string $cursor Opaque cursor for the next page of this subject's action history.
     * @return array<string, mixed>
     */
    public function rawQuery(string $subject, ?string $did = null, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
