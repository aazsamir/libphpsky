<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckHandleAvailability;

/**
 * Checks whether the provided handle is available. If the handle is not available, available suggestions will be returned. Optional inputs will be used to generate suggestions.
 * query
 */
class CheckHandleAvailability implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.temp.checkHandleAvailability';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $handle Tentative handle. Will be checked for availability or used to build handle suggestions.
     * @param ?string $email User-provided email. Might be used to build handle suggestions.
     * @param ?\DateTimeInterface $birthDate User-provided birth date. Might be used to build handle suggestions.
     */
    public function query(string $handle, ?string $email = null, ?\DateTimeInterface $birthDate = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckHandleAvailability\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $handle Tentative handle. Will be checked for availability or used to build handle suggestions.
     * @param ?string $email User-provided email. Might be used to build handle suggestions.
     * @param ?\DateTimeInterface $birthDate User-provided birth date. Might be used to build handle suggestions.
     * @return array<string, mixed>
     */
    public function rawQuery(string $handle, ?string $email = null, ?\DateTimeInterface $birthDate = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
