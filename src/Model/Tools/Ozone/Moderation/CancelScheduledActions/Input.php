<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\CancelScheduledActions;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.moderation.cancelScheduledActions';

    /** @var array<string> Array of DID subjects to cancel scheduled actions for */
    public array $subjects = [];

    /** @var ?string Optional comment describing the reason for cancellation */
    public ?string $comment;

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
        return ['subjects'];
    }

    /**
     * @param array<string> $subjects
     */
    public static function new(array $subjects, ?string $comment = null): self
    {
        $instance = new self();
        $instance->subjects = $subjects;
        if ($comment !== null) {
            $instance->comment = $comment;
        }

        return $instance;
    }
}
