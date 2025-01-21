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

    /** @var string Name of the template. */
    public string $name;

    /** @var string Content of the template, markdown supported, can contain variable placeholders. */
    public string $contentMarkdown;

    /** @var string Subject of the message, used in emails. */
    public string $subject;

    /** @var ?string Message language. */
    public ?string $lang;

    /** @var ?string DID of the user who is creating the template. */
    public ?string $createdBy;

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
        return ['subject', 'contentMarkdown', 'name'];
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
        if ($lang !== null) {
            $instance->lang = $lang;
        }
        if ($createdBy !== null) {
            $instance->createdBy = $createdBy;
        }

        return $instance;
    }
}
