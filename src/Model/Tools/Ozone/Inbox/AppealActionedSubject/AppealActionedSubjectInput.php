<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\AppealActionedSubject;

/**
 * object
 */
class AppealActionedSubjectInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.inbox.appealActionedSubject';

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\AppealActionedSubject\ActionRef|\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\AppealActionedSubject\LabelRef|\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\AppealActionedSubject\TakedownRef|null Moderation action being appealed. */
    public mixed $action;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef Subject being appealed. */
    public mixed $subject;

    /** @var ?string Optional explanation supplied by the user. */
    public ?string $reason;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Moderation\CreateReport\ModTool $modTool;

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
        ActionRef|LabelRef|TakedownRef|null $action = null,
        ?string $reason = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Moderation\CreateReport\ModTool $modTool = null,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        if ($action !== null) {
            $instance->action = $action;
        }
        if ($reason !== null) {
            $instance->reason = $reason;
        }
        if ($modTool !== null) {
            $instance->modTool = $modTool;
        }

        return $instance;
    }
}
