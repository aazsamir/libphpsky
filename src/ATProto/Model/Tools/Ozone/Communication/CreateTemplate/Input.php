<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\CreateTemplate;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.communication.createTemplate';

    public string $name;
    public string $contentMarkdown;
    public string $subject;
    public ?string $lang = null;
    public ?string $createdBy = null;

    public static function id(): string
    {
        return self::ID;
    }
}
