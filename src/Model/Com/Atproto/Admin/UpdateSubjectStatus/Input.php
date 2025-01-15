<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateSubjectStatus;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.updateSubjectStatus';

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoBlobRef */
    public mixed $subject;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\StatusAttr $takedown = null;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\StatusAttr $deactivated = null;

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
