<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\Defs;

/**
 * object
 */
class TemplateView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'templateView';
    public const ID = 'tools.ozone.communication.defs';

    public string $id;
    public string $name;
    public ?string $subject = null;
    public string $contentMarkdown;
    public bool $disabled;
    public ?string $lang = null;
    public string $lastUpdatedBy;
    public string $createdAt;
    public string $updatedAt;

    public static function id(): string
    {
        return self::ID;
    }
}
