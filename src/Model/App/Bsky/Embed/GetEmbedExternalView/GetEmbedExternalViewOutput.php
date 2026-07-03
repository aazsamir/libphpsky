<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\GetEmbedExternalView;

/**
 * object
 */
class GetEmbedExternalViewOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.embed.getEmbedExternalView';

    /** @var ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\View Hydrated view of the embed. Present only when the resolved records back the requested URL and supply enough information to populate the required `viewExternal` fields. Omitted alongside the rest of the response when no records resolved or validation failed. */
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\View $view;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef> StrongRefs (URI+CID) of the Atmosphere records that backed this view, suitable for embedding into a post's external.associatedRefs. */
    public ?array $associatedRefs = [];

    /** @var ?array<mixed> */
    public ?array $associatedRecords = [];

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
        return [];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef> $associatedRefs
     * @param array<mixed> $associatedRecords
     */
    public static function new(
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\View $view = null,
        ?array $associatedRefs = [],
        ?array $associatedRecords = [],
    ): self {
        $instance = new self();
        if ($view !== null) {
            $instance->view = $view;
        }
        if ($associatedRefs !== null) {
            $instance->associatedRefs = $associatedRefs;
        }
        if ($associatedRecords !== null) {
            $instance->associatedRecords = $associatedRecords;
        }

        return $instance;
    }
}
