<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetRelationships;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getRelationships';

    public ?string $actor = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\Relationship|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\NotFoundActor> */
    public array $relationships = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\Relationship|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\NotFoundActor> $relationships
     */
    public static function new(array $relationships, ?string $actor = null): self
    {
        $instance = new self();
        $instance->relationships = $relationships;
        $instance->actor = $actor;

        return $instance;
    }
}
