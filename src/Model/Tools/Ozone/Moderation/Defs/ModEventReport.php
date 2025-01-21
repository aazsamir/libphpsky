<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Report a subject
 * object
 */
class ModEventReport implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventReport';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;

    /** @var ?bool Set to true if the reporter was muted from reporting at the time of the event. These reports won't impact the reviewState of the subject. */
    public ?bool $isReporterMuted;
    public ?string $reportType;

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
        return ['reportType'];
    }

    public static function new(
        ?string $comment = null,
        ?bool $isReporterMuted = null,
        ?string $reportType = null,
    ): self {
        $instance = new self();
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($isReporterMuted !== null) {
            $instance->isReporterMuted = $isReporterMuted;
        }
        if ($reportType !== null) {
            $instance->reportType = $reportType;
        }

        return $instance;
    }
}
