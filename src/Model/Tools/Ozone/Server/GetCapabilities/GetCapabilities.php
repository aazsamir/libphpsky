<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetCapabilities;

/**
 * query
 */
class GetCapabilities implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.server.getCapabilities';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(): GetCapabilitiesOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetCapabilities\GetCapabilitiesOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
