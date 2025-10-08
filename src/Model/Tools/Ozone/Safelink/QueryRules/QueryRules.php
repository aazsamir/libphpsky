<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\QueryRules;

/**
 * Query URL safety rules
 * procedure
 */
class QueryRules implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.safelink.queryRules';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\QueryRules\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
