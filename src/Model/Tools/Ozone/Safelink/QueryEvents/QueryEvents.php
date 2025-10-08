<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\QueryEvents;

/**
 * Query URL safety audit events
 * procedure
 */
class QueryEvents implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.safelink.queryEvents';

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
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\QueryEvents\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
