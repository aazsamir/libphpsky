<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\GetUploadLimits;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.video.getUploadLimits';

    public bool $canUpload;
    public ?int $remainingDailyVideos = null;
    public ?int $remainingDailyBytes = null;
    public ?string $message = null;
    public ?string $error = null;

    public static function id(): string
    {
        return self::ID;
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
        $instance->remainingDailyVideos = $remainingDailyVideos;
        $instance->remainingDailyBytes = $remainingDailyBytes;
        $instance->message = $message;
        $instance->error = $error;

        return $instance;
    }
}
