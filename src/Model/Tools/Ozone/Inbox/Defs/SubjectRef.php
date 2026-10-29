<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * object
 */
class SubjectRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'subjectRef';
    public const ID = 'tools.ozone.inbox.defs';

    /** @var ?string Decision captured when an appealResolved notification was created. Omitted when the outcome is unknown. */
    public ?string $appealOutcome;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef */
    public mixed $subject;
    public ?string $actionType;
    public ?int $actionId;

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
        return ['subject'];
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject,
        ?string $appealOutcome = null,
        ?string $actionType = null,
        ?int $actionId = null,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        if ($appealOutcome !== null) {
            $instance->appealOutcome = $appealOutcome;
        }
        if ($actionType !== null) {
            $instance->actionType = $actionType;
        }
        if ($actionId !== null) {
            $instance->actionId = $actionId;
        }

        return $instance;
    }
}
