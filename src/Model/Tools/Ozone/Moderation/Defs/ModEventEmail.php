<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Keep a log of outgoing email to a user
 * object
 */
class ModEventEmail implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventEmail';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var string The subject line of the email sent to the user. */
    public string $subjectLine;

    /** @var ?string The content of the email sent to the user. */
    public ?string $content;

    /** @var ?string Additional comment about the outgoing comm. */
    public ?string $comment;

    /** @var ?array<string> Names/Keywords of the policies that necessitated the email. */
    public ?array $policies = [];

    /** @var ?string Severity level of the violation. Normally 'sev-1' that adds strike on repeat offense */
    public ?string $severityLevel;

    /** @var ?int Number of strikes to assign to the user for this violation. Normally 0 as an indicator of a warning and only added as a strike on a repeat offense. */
    public ?int $strikeCount;

    /** @var ?\DateTimeInterface When the strike should expire. If not provided, the strike never expires. */
    public ?\DateTimeInterface $strikeExpiresAt;

    /** @var ?bool Indicates whether the email was successfully delivered to the user's inbox. */
    public ?bool $isDelivered;

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
        return ['subjectLine'];
    }

    /**
     * @param array<string> $policies
     */
    public static function new(
        string $subjectLine,
        ?string $content = null,
        ?string $comment = null,
        ?array $policies = [],
        ?string $severityLevel = null,
        ?int $strikeCount = null,
        ?\DateTimeInterface $strikeExpiresAt = null,
        ?bool $isDelivered = null,
    ): self {
        $instance = new self();
        $instance->subjectLine = $subjectLine;
        if ($content !== null) {
            $instance->content = $content;
        }
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($policies !== null) {
            $instance->policies = $policies;
        }
        if ($severityLevel !== null) {
            $instance->severityLevel = $severityLevel;
        }
        if ($strikeCount !== null) {
            $instance->strikeCount = $strikeCount;
        }
        if ($strikeExpiresAt !== null) {
            $instance->strikeExpiresAt = $strikeExpiresAt;
        }
        if ($isDelivered !== null) {
            $instance->isDelivered = $isDelivered;
        }

        return $instance;
    }
}
