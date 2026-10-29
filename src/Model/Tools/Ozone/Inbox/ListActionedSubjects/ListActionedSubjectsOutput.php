<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\ListActionedSubjects;

/**
 * object
 */
class ListActionedSubjectsOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.inbox.listActionedSubjects';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\SubjectView> */
    public array $subjects = [];

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
        return ['subjects'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\SubjectView> $subjects
     */
    public static function new(array $subjects, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->subjects = $subjects;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
