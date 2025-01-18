<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\UpdateTemplate;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.communication.updateTemplate';

    public string $id;
    public ?string $name;
    public ?string $lang;
    public ?string $contentMarkdown;
    public ?string $subject;
    public ?string $updatedBy;
    public ?bool $disabled;

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
        return ['id'];
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
        if ($name !== null) {
            $instance->name = $name;
        }
        if ($lang !== null) {
            $instance->lang = $lang;
        }
        if ($contentMarkdown !== null) {
            $instance->contentMarkdown = $contentMarkdown;
        }
        if ($subject !== null) {
            $instance->subject = $subject;
        }
        if ($updatedBy !== null) {
            $instance->updatedBy = $updatedBy;
        }
        if ($disabled !== null) {
            $instance->disabled = $disabled;
        }

        return $instance;
    }
}
