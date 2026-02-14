<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Lexicon\ResolveLexicon;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.lexicon.resolveLexicon';

    /** @var string The CID of the lexicon schema record. */
    public string $cid;

    /** @var ?\Aazsamir\Libphpsky\Model\Com\Atproto\Lexicon\Schema\Schema The resolved lexicon schema record. */
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Lexicon\Schema\Schema $schema;

    /** @var string The AT-URI of the lexicon schema record. */
    public string $uri;

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
        return ['uri', 'cid', 'schema'];
    }

    public static function new(
        string $cid,
        string $uri,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Lexicon\Schema\Schema $schema = null,
    ): self {
        $instance = new self();
        $instance->cid = $cid;
        $instance->uri = $uri;
        if ($schema !== null) {
            $instance->schema = $schema;
        }

        return $instance;
    }
}
