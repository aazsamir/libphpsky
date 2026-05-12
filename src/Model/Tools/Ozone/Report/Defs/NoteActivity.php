<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs;

/**
 * Activity recording a note on a report. Use internalNote for moderator-only notes or publicNote for reporter-visible notes (or both).
 * object
 */
class NoteActivity implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'noteActivity';
    public const ID = 'tools.ozone.report.defs';

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
        return [];
    }

    public static function new(): self
    {
        $instance = new self();

        return $instance;
    }
}
