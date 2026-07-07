<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\AcceptConvo;

/**
 * Marks a conversation as accepted, so it is shown in the list of accepted convos instead on the request convos.
 * procedure
 */
class AcceptConvo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.acceptConvo';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(AcceptConvoInput $input): AcceptConvoOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\AcceptConvo\AcceptConvoOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(AcceptConvoInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
