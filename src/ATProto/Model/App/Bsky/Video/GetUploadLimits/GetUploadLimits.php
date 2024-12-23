<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\GetUploadLimits;

/**
 * Get video upload limits for the authenticated user.
 * query
 */
class GetUploadLimits implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.video.getUploadLimits';

    public static function id(): string
    {
        return self::ID;
    }

    function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Video\GetUploadLimits\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
