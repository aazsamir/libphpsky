<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\UpdateTemplate;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.communication.updateTemplate';

    public string $id;
    public ?string $name = null;
    public ?string $lang = null;
    public ?string $contentMarkdown = null;
    public ?string $subject = null;
    public ?string $updatedBy = null;
    public ?bool $disabled = null;

    public static function id(): string
    {
        return self::ID;
    }
}
