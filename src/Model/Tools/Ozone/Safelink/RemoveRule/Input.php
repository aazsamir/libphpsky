<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\RemoveRule;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.safelink.removeRule';

    /** @var string The URL or domain to remove the rule for */
    public string $url;
    public ?string $pattern;

    /** @var ?string Optional comment about why the rule is being removed */
    public ?string $comment;

    /** @var ?string Optional DID of the user. Only respected when using admin auth. */
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
        return ['url', 'pattern'];
    }

    public static function new(
        string $url,
        ?string $pattern = null,
        ?string $comment = null,
        ?string $createdBy = null,
    ): self {
        $instance = new self();
        $instance->url = $url;
        if ($pattern !== null) {
            $instance->pattern = $pattern;
        }
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($createdBy !== null) {
            $instance->createdBy = $createdBy;
        }

        return $instance;
    }
}
