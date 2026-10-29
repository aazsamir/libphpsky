<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\UpdateSeen;

/**
 * object
 */
class UpdateSeenInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.inbox.updateSeen';

    /** @var array<string> */
    public array $sections = [];

    /** @var ?\DateTimeInterface Mark each requested section read up to this instant. Defaults to server time and is clamped to server time when in the future. Newer existing watermarks are preserved independently for each section. */
    public ?\DateTimeInterface $seenAt;

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
        return ['sections'];
    }

    /**
     * @param array<string> $sections
     */
    public static function new(array $sections, ?\DateTimeInterface $seenAt = null): self
    {
        $instance = new self();
        $instance->sections = $sections;
        if ($seenAt !== null) {
            $instance->seenAt = $seenAt;
        }

        return $instance;
    }
}
