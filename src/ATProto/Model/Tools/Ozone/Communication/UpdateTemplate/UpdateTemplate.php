<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\UpdateTemplate;

/**
 * Administrative action to update an existing communication template. Allows passing partial fields to patch specific fields only.
 * procedure
 */
class UpdateTemplate implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.communication.updateTemplate';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\Defs\TemplateView
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\Defs\TemplateView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
