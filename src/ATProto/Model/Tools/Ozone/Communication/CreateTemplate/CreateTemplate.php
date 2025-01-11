<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\CreateTemplate;

/**
 * Administrative action to create a new, re-usable communication (email for now) template.
 * procedure
 */
class CreateTemplate implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.communication.createTemplate';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(
        Input $input,
    ): \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\Defs\TemplateView {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\Defs\TemplateView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
