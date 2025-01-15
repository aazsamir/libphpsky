<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\UpdateTemplate;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

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

    public static function new(
        string $id,
        ?string $name = null,
        ?string $lang = null,
        ?string $contentMarkdown = null,
        ?string $subject = null,
        ?string $updatedBy = null,
        ?bool $disabled = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->name = $name;
        $instance->lang = $lang;
        $instance->contentMarkdown = $contentMarkdown;
        $instance->subject = $subject;
        $instance->updatedBy = $updatedBy;
        $instance->disabled = $disabled;

        return $instance;
    }
}
