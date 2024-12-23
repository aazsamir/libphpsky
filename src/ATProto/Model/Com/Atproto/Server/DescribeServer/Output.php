<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\DescribeServer;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.describeServer';

    public ?bool $inviteCodeRequired = null;
    public ?bool $phoneVerificationRequired = null;

    /** @var string[] */
    public array $availableUserDomains = [];
    public ?Links $links = null;
    public ?Contact $contact = null;
    public string $did;

    public static function id(): string
    {
        return self::ID;
    }
}
