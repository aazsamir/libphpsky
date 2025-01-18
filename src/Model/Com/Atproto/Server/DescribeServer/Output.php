<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\DescribeServer;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.describeServer';

    public ?bool $inviteCodeRequired = null;
    public ?bool $phoneVerificationRequired = null;

    /** @var array<string> */
    public array $availableUserDomains = [];
    public ?Links $links = null;
    public ?Contact $contact = null;
    public string $did;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $availableUserDomains
     */
    public static function new(
        array $availableUserDomains,
        string $did,
        ?bool $inviteCodeRequired = null,
        ?bool $phoneVerificationRequired = null,
        ?Links $links = null,
        ?Contact $contact = null,
    ): self {
        $instance = new self();
        $instance->availableUserDomains = $availableUserDomains;
        $instance->did = $did;
        $instance->inviteCodeRequired = $inviteCodeRequired;
        $instance->phoneVerificationRequired = $phoneVerificationRequired;
        $instance->links = $links;
        $instance->contact = $contact;

        return $instance;
    }
}
