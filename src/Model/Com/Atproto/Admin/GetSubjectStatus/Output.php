<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetSubjectStatus;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.admin.getSubjectStatus';

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoBlobRef */
    public mixed $subject;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\StatusAttr $takedown;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\StatusAttr $deactivated;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoBlobRef $subject,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\StatusAttr $takedown = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\StatusAttr $deactivated = null,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        $instance->takedown = $takedown;
        $instance->deactivated = $deactivated;

        return $instance;
    }
}
