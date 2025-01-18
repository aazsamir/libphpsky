<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\FetchLabels;

/**
 * DEPRECATED: use queryLabels or subscribeLabels instead -- Fetch all labels from a labeler created after a certain date.
 * query
 */
class FetchLabels implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.temp.fetchLabels';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(?int $since = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\FetchLabels\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
