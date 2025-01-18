<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Video\GetUploadLimits;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.video.getUploadLimits';

    public bool $canUpload;
    public ?int $remainingDailyVideos;
    public ?int $remainingDailyBytes;
    public ?string $message;
    public ?string $error;

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
        return ['canUpload'];
    }

    public static function new(
        bool $canUpload,
        ?int $remainingDailyVideos = null,
        ?int $remainingDailyBytes = null,
        ?string $message = null,
        ?string $error = null,
    ): self {
        $instance = new self();
        $instance->canUpload = $canUpload;
        if ($remainingDailyVideos !== null) {
            $instance->remainingDailyVideos = $remainingDailyVideos;
        }
        if ($remainingDailyBytes !== null) {
            $instance->remainingDailyBytes = $remainingDailyBytes;
        }
        if ($message !== null) {
            $instance->message = $message;
        }
        if ($error !== null) {
            $instance->error = $error;
        }

        return $instance;
    }
}
