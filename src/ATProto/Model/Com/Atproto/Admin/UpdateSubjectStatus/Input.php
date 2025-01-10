<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\UpdateSubjectStatus;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.updateSubjectStatus';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\UpdateSubjectStatus\UpdateSubjectStatus|\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\RepoBlobRef */
    public mixed $subject;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\StatusAttr $takedown = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\StatusAttr $deactivated = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        mixed $subject,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\StatusAttr $takedown = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\StatusAttr $deactivated = null,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        $instance->takedown = $takedown;
        $instance->deactivated = $deactivated;

        return $instance;
    }
}
