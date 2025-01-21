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

    /** @var string ID of the template to be updated. */
    public string $id;

    /** @var ?string Name of the template. */
    public ?string $name;

    /** @var ?string Message language. */
    public ?string $lang;

    /** @var ?string Content of the template, markdown supported, can contain variable placeholders. */
    public ?string $contentMarkdown;

    /** @var ?string Subject of the message, used in emails. */
    public ?string $subject;

    /** @var ?string DID of the user who is updating the template. */
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
