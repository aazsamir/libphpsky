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

    public ?bool $inviteCodeRequired;
    public ?bool $phoneVerificationRequired;

    /** @var array<string> */
    public array $availableUserDomains = [];
    public ?Links $links;
    public ?Contact $contact;
    public string $did;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['did', 'availableUserDomains'];
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
        if ($inviteCodeRequired !== null) {
            $instance->inviteCodeRequired = $inviteCodeRequired;
        }
        if ($phoneVerificationRequired !== null) {
            $instance->phoneVerificationRequired = $phoneVerificationRequired;
        }
        if ($links !== null) {
            $instance->links = $links;
        }
        if ($contact !== null) {
            $instance->contact = $contact;
        }

        return $instance;
    }
}
