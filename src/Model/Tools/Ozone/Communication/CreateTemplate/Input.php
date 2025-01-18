<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\CreateTemplate;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.communication.createTemplate';

    public string $name;
    public string $contentMarkdown;
    public string $subject;
    public ?string $lang;
    public ?string $createdBy;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $name,
        string $contentMarkdown,
        string $subject,
        ?string $lang = null,
        ?string $createdBy = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->contentMarkdown = $contentMarkdown;
        $instance->subject = $subject;
        $instance->lang = $lang;
        $instance->createdBy = $createdBy;

        return $instance;
    }
}
