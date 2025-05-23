<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\CreateTemplate;

/**
 * Administrative action to create a new, re-usable communication (email for now) template.
 * procedure
 */
class CreateTemplate implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.communication.createTemplate';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\Defs\TemplateView
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\Defs\TemplateView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
