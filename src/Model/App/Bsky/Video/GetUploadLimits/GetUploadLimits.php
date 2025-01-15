<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Video\GetUploadLimits;

/**
 * Get video upload limits for the authenticated user.
 * query
 */
class GetUploadLimits implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.video.getUploadLimits';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Video\GetUploadLimits\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}