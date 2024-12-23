<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\FindCorrelation;

/**
 * Find all correlated threat signatures between 2 or more accounts.
 * query
 */
class FindCorrelation implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.signature.findCorrelation';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $dids
     */
    function query(array $dids): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\FindCorrelation\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
