<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\Defs;

/**
 * object
 */
class TemplateView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'templateView';
    public const ID = 'tools.ozone.communication.defs';

    public string $id;

    /** @var string Name of the template. */
    public string $name;

    /** @var ?string Content of the template, can contain markdown and variable placeholders. */
    public ?string $subject;

    /** @var string Subject of the message, used in emails. */
    public string $contentMarkdown;
    public bool $disabled;

    /** @var ?string Message language. */
    public ?string $lang;

    /** @var string DID of the user who last updated the template. */
    public string $lastUpdatedBy;
    public \DateTimeInterface $createdAt;
    public \DateTimeInterface $updatedAt;

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
        return ['id', 'name', 'contentMarkdown', 'disabled', 'lastUpdatedBy', 'createdAt', 'updatedAt'];
    }

    public static function new(
        string $id,
        string $name,
        string $contentMarkdown,
        bool $disabled,
        string $lastUpdatedBy,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        ?string $subject = null,
        ?string $lang = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->name = $name;
        $instance->contentMarkdown = $contentMarkdown;
        $instance->disabled = $disabled;
        $instance->lastUpdatedBy = $lastUpdatedBy;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        if ($subject !== null) {
            $instance->subject = $subject;
        }
        if ($lang !== null) {
            $instance->lang = $lang;
        }

        return $instance;
    }
}
