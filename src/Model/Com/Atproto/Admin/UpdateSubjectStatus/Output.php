<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateSubjectStatus;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.admin.updateSubjectStatus';

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoBlobRef */
    public mixed $subject;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\StatusAttr $takedown;

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
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoBlobRef $subject,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\StatusAttr $takedown = null,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        if ($takedown !== null) {
            $instance->takedown = $takedown;
        }

        return $instance;
    }
}
