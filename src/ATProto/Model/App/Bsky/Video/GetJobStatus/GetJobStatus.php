<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\GetJobStatus;

/**
 * Get status details for a video processing job.
 * query
 */
class GetJobStatus implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.video.getJobStatus';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $jobId): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\GetJobStatus\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
