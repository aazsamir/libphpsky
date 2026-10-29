<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetReport;

/**
 * object
 */
class ResolutionView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'resolutionView';
    public const ID = 'tools.ozone.inbox.getReport';

    public string $outcome;

    /** @var ?string Public action associated with this report's resolution. See the public action vocabulary table. */
    public ?string $actionTaken;
    public ?string $scope;
    public \DateTimeInterface $resolvedAt;

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
        return ['outcome', 'resolvedAt'];
    }

    public static function new(
        string $outcome,
        \DateTimeInterface $resolvedAt,
        ?string $actionTaken = null,
        ?string $scope = null,
    ): self {
        $instance = new self();
        $instance->outcome = $outcome;
        $instance->resolvedAt = $resolvedAt;
        if ($actionTaken !== null) {
            $instance->actionTaken = $actionTaken;
        }
        if ($scope !== null) {
            $instance->scope = $scope;
        }

        return $instance;
    }
}
