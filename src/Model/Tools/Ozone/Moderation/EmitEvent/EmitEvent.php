<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\EmitEvent;

/**
 * Take a moderation action on an actor.
 * procedure
 */
class EmitEvent implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.emitEvent';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(
        EmitEventInput $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventView {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(EmitEventInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
