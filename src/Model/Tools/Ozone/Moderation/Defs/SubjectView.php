<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Detailed view of a subject. For record subjects, the author's repo and profile will be returned.
 * object
 */
class SubjectView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'subjectView';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $type;
    public string $subject;
    public ?SubjectStatusView $status;
    public ?RepoViewDetail $repo;
    public mixed $profile;
    public ?RecordViewDetail $record;

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
        return ['type', 'subject'];
    }

    public static function new(
        string $subject,
        ?string $type = null,
        ?SubjectStatusView $status = null,
        ?RepoViewDetail $repo = null,
        mixed $profile = null,
        ?RecordViewDetail $record = null,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        if ($type !== null) {
            $instance->type = $type;
        }
        if ($status !== null) {
            $instance->status = $status;
        }
        if ($repo !== null) {
            $instance->repo = $repo;
        }
        if ($profile !== null) {
            $instance->profile = $profile;
        }
        if ($record !== null) {
            $instance->record = $record;
        }

        return $instance;
    }
}
