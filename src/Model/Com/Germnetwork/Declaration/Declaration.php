<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Germnetwork\Declaration;

/**
 * object
 */
class Declaration implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'com.germnetwork.declaration';

    /** @var string Semver version number, without pre-release or build information, for the format of opaque content */
    public string $version;

    /** @var string Opaque value, an ed25519 public key prefixed with a byte enum */
    public string $currentKey;

    /** @var ?\Aazsamir\Libphpsky\Model\Com\Germnetwork\Declaration\MessageMe Controls who can message this account */
    public ?MessageMe $messageMe;

    /** @var ?string Opaque value, contains MLS KeyPackage(s), and other signature data, and is signed by the currentKey */
    public ?string $keyPackage;

    /** @var ?array<string> Array of opaque values to allow for key rolling */
    public ?array $continuityProofs = [];

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
        return ['version', 'currentKey'];
    }

    /**
     * @param array<string> $continuityProofs
     */
    public static function new(
        string $version,
        string $currentKey,
        ?MessageMe $messageMe = null,
        ?string $keyPackage = null,
        ?array $continuityProofs = [],
    ): self {
        $instance = new self();
        $instance->version = $version;
        $instance->currentKey = $currentKey;
        if ($messageMe !== null) {
            $instance->messageMe = $messageMe;
        }
        if ($keyPackage !== null) {
            $instance->keyPackage = $keyPackage;
        }
        if ($continuityProofs !== null) {
            $instance->continuityProofs = $continuityProofs;
        }

        return $instance;
    }
}
