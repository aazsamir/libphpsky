<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\ListTemplates;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.communication.listTemplates';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\Defs\TemplateView[] */
    public array $communicationTemplates = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Communication\Defs\TemplateView[] $communicationTemplates
     */
    public static function new(array $communicationTemplates): self
    {
        $instance = new self();
        $instance->communicationTemplates = $communicationTemplates;

        return $instance;
    }
}
