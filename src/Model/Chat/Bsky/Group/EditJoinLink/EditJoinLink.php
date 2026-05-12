<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\EditJoinLink;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Edits the existing join link settings for the group convo.
 * procedure
 */
class EditJoinLink implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.editJoinLink';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\EditJoinLink\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
