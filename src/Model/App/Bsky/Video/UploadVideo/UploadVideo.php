<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Video\UploadVideo;

/**
 * Upload a video to be processed then stored on the PDS.
 * procedure
 */
class UploadVideo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.video.uploadVideo';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Video\UploadVideo\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
