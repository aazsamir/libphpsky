<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\ListAppPasswords;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.listAppPasswords';

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\ListAppPasswords\AppPassword> */
    public array $passwords = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\ListAppPasswords\AppPassword> $passwords
     */
    public static function new(array $passwords): self
    {
        $instance = new self();
        $instance->passwords = $passwords;

        return $instance;
    }
}