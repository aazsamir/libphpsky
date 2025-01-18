<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Video\Defs;

/**
 * object
 */
class JobStatus implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'jobStatus';
    public const ID = 'app.bsky.video.defs';

    public string $jobId;
    public string $did;
    public string $state;
    public ?int $progress;
    public ?string $blob;
    public ?string $error;
    public ?string $message;

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
        return ['jobId', 'did', 'state'];
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
        if ($progress !== null) {
            $instance->progress = $progress;
        }
        if ($blob !== null) {
            $instance->blob = $blob;
        }
        if ($error !== null) {
            $instance->error = $error;
        }
        if ($message !== null) {
            $instance->message = $message;
        }

        return $instance;
    }
}
