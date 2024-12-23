<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\Defs;

/**
 * object
 */
class JobStatus implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'jobStatus';
    public const ID = 'app.bsky.video.defs';

    public string $jobId;
    public string $did;
    public string $state;
    public ?int $progress = null;
    public ?string $blob = null;
    public ?string $error = null;
    public ?string $message = null;

    public static function id(): string
    {
        return self::ID;
    }
}
