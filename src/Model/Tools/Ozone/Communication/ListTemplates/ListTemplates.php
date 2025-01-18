<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\ListTemplates;

/**
 * Get list of all communication templates.
 * query
 */
class ListTemplates implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.communication.listTemplates';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\ListTemplates\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
