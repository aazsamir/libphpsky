<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Video\UploadVideo;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.video.uploadVideo';

    public \Aazsamir\Libphpsky\Model\App\Bsky\Video\Defs\JobStatus $jobStatus;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(\Aazsamir\Libphpsky\Model\App\Bsky\Video\Defs\JobStatus $jobStatus): self
    {
        $instance = new self();
        $instance->jobStatus = $jobStatus;

        return $instance;
    }
}
