<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * A subject belonging to the viewer that has moderation actions against it.
 * object
 */
class SubjectView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'subjectView';
    public const ID = 'tools.ozone.inbox.defs';

    /** @var string DID of the moderation service that took the actions. */
    public string $src;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef */
    public mixed $subject;
    public ?EnforcementView $enforcement;
    public ?AppealView $appeal;

    /** @var ?array<string> */
    public ?array $availableActions = [];
    public ?ActionView $latestAction;
    public ?int $actionCount;
    public \DateTimeInterface $createdAt;
    public \DateTimeInterface $updatedAt;
    public bool $isRead;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['src', 'subject', 'enforcement', 'isRead', 'createdAt', 'updatedAt'];
    }

    /**
     * @param array<string> $availableActions
     */
    public static function new(
        string $src,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        bool $isRead,
        ?EnforcementView $enforcement = null,
        ?AppealView $appeal = null,
        ?array $availableActions = [],
        ?ActionView $latestAction = null,
        ?int $actionCount = null,
    ): self {
        $instance = new self();
        $instance->src = $src;
        $instance->subject = $subject;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        $instance->isRead = $isRead;
        if ($enforcement !== null) {
            $instance->enforcement = $enforcement;
        }
        if ($appeal !== null) {
            $instance->appeal = $appeal;
        }
        if ($availableActions !== null) {
            $instance->availableActions = $availableActions;
        }
        if ($latestAction !== null) {
            $instance->latestAction = $latestAction;
        }
        if ($actionCount !== null) {
            $instance->actionCount = $actionCount;
        }

        return $instance;
    }
}
