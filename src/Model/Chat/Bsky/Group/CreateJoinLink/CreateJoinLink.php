<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\CreateJoinLink;

/**
 * Creates a join link for the group convo.
 * procedure
 */
class CreateJoinLink implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.createJoinLink';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(CreateJoinLinkInput $input): CreateJoinLinkOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\CreateJoinLink\CreateJoinLinkOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(CreateJoinLinkInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
