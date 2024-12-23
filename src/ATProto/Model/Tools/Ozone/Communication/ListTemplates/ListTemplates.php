<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\ListTemplates;

/**
 * Get list of all communication templates.
 * query
 */
class ListTemplates implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.communication.listTemplates';

    public static function id(): string
    {
        return self::ID;
    }

    function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\ListTemplates\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
