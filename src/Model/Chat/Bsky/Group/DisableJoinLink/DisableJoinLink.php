<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\DisableJoinLink;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Disables the active join link for the group convo.
 * procedure
 */
class DisableJoinLink implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.disableJoinLink';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(DisableJoinLinkInput $input): DisableJoinLinkOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\DisableJoinLink\DisableJoinLinkOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
