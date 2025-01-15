<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Video\Defs;

/**
 * object
 */
class JobStatus implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

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

    public static function new(
        string $jobId,
        string $did,
        string $state,
        ?int $progress = null,
        ?string $blob = null,
        ?string $error = null,
        ?string $message = null,
    ): self {
        $instance = new self();
        $instance->jobId = $jobId;
        $instance->did = $did;
        $instance->state = $state;
        $instance->progress = $progress;
        $instance->blob = $blob;
        $instance->error = $error;
        $instance->message = $message;

        return $instance;
    }
}