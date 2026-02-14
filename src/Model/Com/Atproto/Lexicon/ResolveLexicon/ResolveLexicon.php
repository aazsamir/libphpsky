<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Lexicon\ResolveLexicon;

/**
 * Resolves an atproto lexicon (NSID) to a schema.
 * query
 */
class ResolveLexicon implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.lexicon.resolveLexicon';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $nsid The lexicon NSID to resolve.
     */
    public function query(string $nsid): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Lexicon\ResolveLexicon\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $nsid The lexicon NSID to resolve.
     * @return array<string, mixed>
     */
    public function rawQuery(string $nsid): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
