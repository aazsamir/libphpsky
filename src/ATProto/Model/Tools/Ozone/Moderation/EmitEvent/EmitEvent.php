<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\EmitEvent;

/**
 * Take a moderation action on an actor.
 * procedure
 */
class EmitEvent implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.emitEvent';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(
        Input $input,
    ): \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventView {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
