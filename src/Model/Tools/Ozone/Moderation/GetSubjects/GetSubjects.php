<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetSubjects;

/**
 * Get details about subjects.
 * query
 */
class GetSubjects implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.getSubjects';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $subjects
     */
    public function query(array $subjects): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetSubjects\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param array<string> $subjects
     * @return array<string, mixed>
     */
    public function rawQuery(array $subjects): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
