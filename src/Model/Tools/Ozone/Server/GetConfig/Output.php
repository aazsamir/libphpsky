<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.server.getConfig';

    public ?ServiceConfig $appview;
    public ?ServiceConfig $pds;
    public ?ServiceConfig $blobDivert;
    public ?ServiceConfig $chat;
    public ?ViewerConfig $viewer;

    /** @var ?string The did of the verifier used for verification. */
    public ?string $verifierDid;

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
        return [];
    }

    public static function new(
        ?ServiceConfig $appview = null,
        ?ServiceConfig $pds = null,
        ?ServiceConfig $blobDivert = null,
        ?ServiceConfig $chat = null,
        ?ViewerConfig $viewer = null,
        ?string $verifierDid = null,
    ): self {
        $instance = new self();
        if ($appview !== null) {
            $instance->appview = $appview;
        }
        if ($pds !== null) {
            $instance->pds = $pds;
        }
        if ($blobDivert !== null) {
            $instance->blobDivert = $blobDivert;
        }
        if ($chat !== null) {
            $instance->chat = $chat;
        }
        if ($viewer !== null) {
            $instance->viewer = $viewer;
        }
        if ($verifierDid !== null) {
            $instance->verifierDid = $verifierDid;
        }

        return $instance;
    }
}
