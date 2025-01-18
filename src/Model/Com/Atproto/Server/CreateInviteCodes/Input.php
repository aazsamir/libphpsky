<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCodes;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.createInviteCodes';

    public int $codeCount;
    public int $useCount;

    /** @var array<string>|null */
    public ?array $forAccounts = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $forAccounts
     */
    public static function new(int $codeCount, int $useCount, ?array $forAccounts = null): self
    {
        $instance = new self();
        $instance->codeCount = $codeCount;
        $instance->useCount = $useCount;
        $instance->forAccounts = $forAccounts;

        return $instance;
    }
}
