<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\UploadVideo;

/**
 * Upload a video to be processed then stored on the PDS.
 * procedure
 */
class UploadVideo implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.video.uploadVideo';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\UploadVideo\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
