<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Labeler\GetServices;

/**
 * Get information about a list of labeler services.
 * query
 */
class GetServices implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.labeler.getServices';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $dids
     */
    public function query(array $dids, ?bool $detailed = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Labeler\GetServices\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
