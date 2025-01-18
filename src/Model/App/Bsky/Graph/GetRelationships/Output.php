<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetRelationships;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getRelationships';

    public ?string $actor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\Relationship|\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\NotFoundActor> */
    public array $relationships = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\Relationship|\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\NotFoundActor> $relationships
     */
    public static function new(array $relationships, ?string $actor = null): self
    {
        $instance = new self();
        $instance->relationships = $relationships;
        $instance->actor = $actor;

        return $instance;
    }
}
