<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead;

/**
 * Updates the read state of a conversation from, optionally specifying the last read message.
 * procedure
 */
class UpdateRead implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.updateRead';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(UpdateReadInput $input): UpdateReadOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead\UpdateReadOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(UpdateReadInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
