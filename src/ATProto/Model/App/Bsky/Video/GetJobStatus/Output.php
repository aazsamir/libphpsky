<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\GetJobStatus;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.video.getJobStatus';

    public \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\Defs\JobStatus $jobStatus;

    public static function id(): string
    {
        return self::ID;
    }
}
