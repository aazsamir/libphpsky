<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\ListTemplates;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.communication.listTemplates';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\Defs\TemplateView> */
    public array $communicationTemplates = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Communication\Defs\TemplateView> $communicationTemplates
     */
    public static function new(array $communicationTemplates): self
    {
        $instance = new self();
        $instance->communicationTemplates = $communicationTemplates;

        return $instance;
    }
}
